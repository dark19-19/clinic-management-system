<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//          Authentication Routes:

Route::get('/register',[AuthController::class, 'showRegister'])->name('register');
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
//Route::get('/logout',[AuthController::class,'showLogout'])->name('logout');

Route::post('/register', [AuthController::class, 'register'])->name('user.register');
Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout')->middleware('auth');
