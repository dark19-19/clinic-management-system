<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrescriptionController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/',PrescriptionController::class);

    Route::get('/patient',[PrescriptionController::class,'showPatientPrescriptions']);
    Route::get('/doctor',[PrescriptionController::class,'showPrescriptionsByDoctor']);

    Route::get('/patient/{patientId}',[PrescriptionController::class,'admin_showPatientPrescriptions']);
    Route::get('/doctor/{doctorId}',[PrescriptionController::class,'admin_showPrescriptionsByDoctor']);
});
