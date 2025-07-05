<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
//    Views Routes
    Route::get('/main', [PatientController::class, 'showCenter'])->name('patient.index');
    Route::get('/find', [PatientController::class, 'showSearch'])->name('patient.find');
    Route::get('/store', [PatientController::class,'showStore'])->name('patient.create');
    Route::get('/update/{id}',[PatientController::class, 'showUpdate'])->name('patient.edit');
    Route::get('/appointments/{id}', [PatientController::class , 'showAppointments'])->name('patient.appointments');
    Route::get('/records/{id}', [PatientController::class, 'showRecords'])->name('patient.records');
    Route::get('/payments/{id}', [PatientController::class, 'showPayments'])->name('patient.payments');
    Route::get('prescriptions/{id}', [PatientController::class, 'showPrescriptions'])->name('patient.prescriptions');

//    API Routes
    Route::get('/search', [PatientController::class, 'search'])->name('patient.search');
    Route::post('/', [PatientController::class, 'store'])->name('patient.store');
    Route::put('/{id}', [PatientController::class, 'update'])->name('patient.update');
    Route::delete('/delete/{id}', [PatientController::class, 'destroy'])->name('patient.delete');
});

//Advertising in dashboard:
Route::get('/lastWeek',[PatientController::class,'getPatientsLastWeek'])->name('lastweek.patient');
