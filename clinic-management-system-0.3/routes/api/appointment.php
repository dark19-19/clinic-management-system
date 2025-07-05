<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserAppointmentController;


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('/patient')->group(function () {
        Route::get('/main', [AppointmentController::class, 'showCenter'])->name('patient.appointment.index');
        Route::get('/accept/{id}', [AppointmentController::class, 'showApprove'])->name('patient.appointment.accept');

        Route::patch('/approve/{id}', [AppointmentController::class, 'approve'])->name('patient.appointment.approve');
        Route::patch('/reject/{id}', [AppointmentController::class, 'reject'])->name('patient.appointment.reject');
        Route::delete('/delete/{id}', [AppointmentController::class, 'destroy'])->name('patient.appointment.delete');
    });

//   User Appointment:
    Route::prefix('/user')->group(function () {
        Route::get('/main', [UserAppointmentController::class, 'showCenter'])->name('user.appointment.index');
        Route::get('/accept/{id}', [UserAppointmentController::class, 'showApprove'])->name('user.appointment.accept');

        Route::patch('/approve/{id}', [UserAppointmentController::class, 'approve'])->name('user.appointment.approve');
        Route::patch('/reject/{id}', [UserAppointmentController::class, 'reject'])->name('user.appointment.reject');
        Route::delete('/delete/{id}', [UserAppointmentController::class, 'destroy'])->name('user.appointment.delete');
    });
});
Route::middleware('auth')->group(function () {
    Route::post('/user', [UserAppointmentController::class, 'store'])->name('user.appointment.store');
    Route::patch('/cancel/{id}', [UserAppointmentController::class, 'cancel'])->name('user.appointment.cancel');
});
