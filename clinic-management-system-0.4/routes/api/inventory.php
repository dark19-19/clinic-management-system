<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/',InventoryController::class);
    Route::get('/exists',[InventoryController::class,'exists']);
    Route::get('/expiry',[InventoryController::class,'trackExpiring']);
});
