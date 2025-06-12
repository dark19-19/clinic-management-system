<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicalRecordController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('',MedicalRecordController::class);

    Route::get('/patient',[MedicalRecordController::class,'showPatientRecords']);
    Route::get('/doctor',[MedicalRecordController::class,'showRecordsByDoctor']);

    Route::get('/patient/{patientId}',[MedicalRecordController::class,'admin_showPatientRecords']);
    Route::get('/doctor/{doctorId}',[MedicalRecordController::class,'admin_showRecordsByDoctor']);
});
