<?php

use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/', [DoctorController::class, 'index']);

    Route::middleware('isAdminstrative')->group(function () {
        Route::post('/', [DoctorController::class, 'store']);
        Route::put('/', [DoctorController::class, 'update']);
        Route::get('/id/{id}', [DoctorController::class, 'showById']);
        Route::get('/docId/{doc_id}', [DoctorController::class, 'showByDocId']);
        Route::delete('/{id}', [DoctorController::class, 'destroy']);
    });
});
