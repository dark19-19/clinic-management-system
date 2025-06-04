<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PharmacistController;

Route::middleware('auth:sanctum')->group(function () {
//   Route::post('/',[PharmacistController::class,'store']);
//   Route::get('/',[PharmacistController::class,'index']);
    Route::apiResource('/',PharmacistController::class);
    Route::get('/license/{licenseNumber}',[PharmacistController::class,'showByLicenseNumber']);
});
