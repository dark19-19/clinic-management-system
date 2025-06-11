<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicalRecordController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('',MedicalRecordController::class);
});
