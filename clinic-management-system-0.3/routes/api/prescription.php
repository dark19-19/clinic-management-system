<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrescriptionController;

Route::middleware(['auth'])->group(function () {
    Route::get('/main', [PrescriptionController::class ,'showCenter'])->name('prescription.index');
    Route::get('/create', [PrescriptionController::class, 'showStore'])->name('prescription.create');

    Route::post('/', [PrescriptionController::class, 'store'])->name('prescription.store');
});
