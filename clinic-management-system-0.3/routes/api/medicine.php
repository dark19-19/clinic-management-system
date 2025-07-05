<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;

Route::middleware(['auth', 'role:admin'])->group(function () {
   Route::get('/main', [MedicineController::class, 'showCenter'])->name('medicine.index');
   Route::get('/create', [MedicineController::class, 'showStore'])->name('medicine.create');
   Route::get('/find', [MedicineController::class, 'showSearch'])->name('medicine.find');
   Route::get('/edit/{id}', [MedicineController::class, 'showUpdate'])->name('medicine.edit');

   Route::post('/', [MedicineController::class, 'store'])->name('medicine.store');
   Route::get('/search', [MedicineController::class , 'search'])->name('medicine.search');
   Route::put('/update/{id}', [MedicineController::class, 'update'])->name('medicine.update');
   Route::delete('/delete/{id}', [MedicineController::class, 'destroy'])->name('medicine.delete');
   Route::get('/filter', [MedicineController::class, 'filter'])->name('medicine.index.filter');
});
