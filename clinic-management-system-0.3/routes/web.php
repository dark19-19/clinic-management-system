<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

//Route::get('/', function () {
//    return view('welcome');
//})->name('welcome.page')->middleware('auth');

Route::middleware('auth')->group(function () {

    Route::get('/',[HomeController::class,'index'])->name('user.home');

});
Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');
Route::get('/success', function () {
    return view('partials.success');
})->name('success');

require __DIR__ . '/api.php';
require __DIR__ . '/auth.php';
