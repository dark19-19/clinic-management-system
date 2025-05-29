<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Pharmacist;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService extends Service
{
    public static function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        switch ($validatedData['role']) {
            case 'doctor':
                $validatedData['role_id'] = 3;
                break;
            case 'pharmacist':
                $validatedData['role_id'] = 5;
                break;
            case 'patient':
                $validatedData['role_id'] = 4;
                break;
        }
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role_id' => $validatedData['role_id']
        ]);
        switch ($validatedData['role']) {
            case 'doctor':
                Doctor::create(['user_id' => $user->id]);
                break;
            case 'pharmacist':
                Pharmacist::create(['user_id' => $user->id]);
                break;
            case 'patient':
                Patient::create(['user_id' => $user->id]);
                break;
        }
        return $user;
    }
    public static function login(LoginRequest $request)
    {
        $validatedData = $request->validated();
        if (!Auth::attempt($validatedData)) {
            return 0;
        }
        $user = User::where('email', $validatedData['email'])->firstOrFail();
        $token = $user->createToken('authToken')->plainTextToken;
        return [
            'user' => $user,
            'token' => $token
        ];
    }
    public static function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }
}
