<?php

use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/main',[DoctorController::class, 'showCenter'])->name('doctor.index');
    Route::get('/store',[DoctorController::class,'showStore'])->name('doctor.create');
    Route::get('/update/{id}', [DoctorController::class, 'showUpdate'])->name('doctor.edit');
    Route::get('/find', [DoctorController::class, 'showSearch'])->name('doctor.find');
    Route::get('/patient/appointments/{id}', [DoctorController::class, 'showPatientAppointments'])->name('doctor.patient.appointments');
    Route::get('/user/appointments/{id}', [DoctorController::class, 'showUserAppointments'])->name('doctor.user.appointments');

    Route::post('/', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/search', [DoctorController::class, 'search'])->name('doctor.search');
    Route::put('/{id}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('/{id}', [DoctorController::class, 'destroy'])->name('doctor.delete');
});
