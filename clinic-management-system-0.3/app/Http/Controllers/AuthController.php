<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = AuthService::register($request);
        return response()->json([
            'message' => 'Account has been created succefully',
            'account' => new UserResource($user)
        ], 201);
    }
    public function login(LoginRequest $request)
    {
        $data = AuthService::login($request);
        return response()->json([
            'message' => 'Your login succeeded',
            'account' => new UserResource($data['user']),
            'token' => $data['token']
        ], 200);
    }
    public function logout(Request $request)
    {
        AuthService::logout($request);
        return response()->json([
            'message' => 'You have logged out'
        ], 200);
    }
}
