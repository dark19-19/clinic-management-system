<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/main',[StaffController::class, 'showCenter'])->name('staff.index');
    Route::get('/store', [StaffController::class, 'showStore'])->name('staff.create');
    Route::get('/find',[StaffController::class, 'showSearch'])->name('staff.find');
    Route::get('/update/{id}', [StaffController::class, 'showUpdate'])->name('staff.edit');

    Route::post('/', [StaffController::class, 'store'])->name('staff.store');
    Route::get('/search', [StaffController::class, 'search'])->name('staff.search');
    Route::put('/{id}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('/{id}',[StaffController::class, 'destroy'])->name('staff.delete');
});
