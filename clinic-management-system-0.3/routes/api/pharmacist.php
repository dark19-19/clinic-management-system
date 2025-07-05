<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PharmacistController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/main', [PharmacistController::class, 'showCenter'])->name('pharma.index');
    Route::get('/store', [PharmacistController::class, 'showStore'])->name('pharma.create');
    Route::get('/update/{id}', [PharmacistController::class, 'showUpdate'])->name('pharma.edit');
    Route::get('/find',[PharmacistController::class, 'showSearch'])->name('pharma.find');

    Route::post('/', [PharmacistController::class , 'store'])->name('pharma.store');
    Route::put('/{id}', [PharmacistController::class, 'update'])->name('pharma.update');
    Route::get('/search', [PharmacistController::class, 'search'])->name('pharma.search');
    Route::delete('/{id}', [PharmacistController::class, 'destroy'])->name('pharma.delete');
});
