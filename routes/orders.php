<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', OrderController::class . '@index');
Route::post('/', OrderController::class . '@store');
Route::get('/{id}', OrderController::class . '@show');
Route::put('/{id}', OrderController::class . '@update');
Route::delete('/{id}', OrderController::class . '@destroy');
