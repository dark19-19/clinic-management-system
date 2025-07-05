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
use function Laravel\Prompts\error;

class AuthService extends Service
{
    public static function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role_id' => 6
        ]);
    }
    public static function login(LoginRequest $request)
    {
        $validatedData = $request->validated();
        if (!\auth()->attempt($validatedData)) {
            error('Password or email is wrong');
        }
        $request->session()->regenerate();
        $user = User::where('email', $validatedData['email'])->firstOrFail();
        $user->login();
        return $user;
    }
    public static function logout(Request $request)
    {
//        \auth()->logout();
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
