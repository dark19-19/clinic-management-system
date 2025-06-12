<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware('isAdminstrative')->group(function () {});
    Route::post('/', [PatientController::class, 'store']);
    Route::put('/{id}', [PatientController::class, 'update']);
    Route::get('/', [PatientController::class, 'index']);
    Route::get('{id}', [PatientController::class, 'show']);
    Route::delete('/{id}', [PatientController::class, 'destroy']);
});
