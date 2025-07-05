<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicalRecordController;

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
       Route::get('/main', [MedicalRecordController::class , 'showAdminCenter'])->name('admin.record.index');
    });
    Route::get('/create', [MedicalRecordController::class, 'showRecordCreateForm'])->name('record.create');

    Route::post('/', [MedicalRecordController::class, 'store'])->name('record.store');
});
