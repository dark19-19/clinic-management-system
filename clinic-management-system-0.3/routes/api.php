<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
//          Authentication Routes:
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    //      Doctor Routes:
    Route::prefix('doctor')->group(function () {
        Route::post('', [DoctorController::class, 'store']);
        Route::put('', [DoctorController::class, 'update']);
        Route::get('', [DoctorController::class, 'index']);
    });
});
