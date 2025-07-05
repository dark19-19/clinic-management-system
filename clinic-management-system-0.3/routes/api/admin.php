<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogController;

Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminIndex'])->name('admin.dashboard');
    Route::get('/users', [DashboardController::class, 'showUsers'])->name('admin.users');
    Route::prefix('/log')->group(function () {
        Route::get('/main', [LogController::class, 'index'])->name('admin.log');
        Route::get('/operation/filter', [LogController::class, 'operationFilter'])->name('log.operation.filter');
        Route::get('/logged/filter', [LogController::class, 'logFilter'])->name('log.logged.filter');
    });
});
