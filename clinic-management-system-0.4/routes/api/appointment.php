<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AppointmentController;
Route::middleware('auth:sanctum')->group(function () {
   Route::post('/',[AppointmentController::class,'book']);
   Route::put('/{appointmentId}',[AppointmentController::class,'update']);
   Route::post('/{appointmentId}/cancel',[AppointmentController::class,'cancel']);
   Route::post('/{appointmentId}/approve',[AppointmentController::class,'approve']);
   Route::post('/{appointmentId}/reject',[AppointmentController::class,'reject']);
   Route::get('/',[AppointmentController::class,'index']);
   Route::get('/{appointmentId}',[AppointmentController::class,'show']);
   Route::get('/show',[AppointmentController::class,'showPatientAppointments']);
   Route::get('/{patientId}/show',[AppointmentController::class,'admin_showPatientAppointments']);
});
