<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/main', [PaymentController::class, 'showCenter'])->name('payment.index');
    Route::get('/create', [PaymentController::class, 'showStore'])->name('payment.create');
    Route::get('/find', [PaymentController::class, 'showSearch'])->name('payment.find');

    Route::post('/', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/search', [PaymentController::class , 'search'])->name('payment.search');
    Route::get('/filter', [PaymentController::class, 'filter'])->name('payment.filter');
});
