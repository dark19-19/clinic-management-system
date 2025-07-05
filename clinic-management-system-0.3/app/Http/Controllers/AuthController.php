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
//        return response()->json([
//            'message' => 'Account has been created succefully',
//            'account' => new UserResource($user)
//        ], 201);
        return redirect(route('login', absolute: false));
    }

    public function login(LoginRequest $request)
    {
        $user = AuthService::login($request);
        if ($user->role_id == 1) {
            return redirect()->intended(route('admin.dashboard', absolute: false));
        }
        return redirect()->intended(route('user.home', absolute: false));
    }

    public function logout(Request $request)
    {
        AuthService::logout($request);
        return redirect()->intended(route('login'));
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showLogout()
    {
        return view('auth.logout');
    }
}
