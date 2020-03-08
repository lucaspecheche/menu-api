<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', CustomerController::class . '@index');
Route::post('/', CustomerController::class . '@store');
Route::get('/{id}', CustomerController::class . '@show');
Route::put('/{id}', CustomerController::class . '@update');
Route::delete('/{id}', CustomerController::class . '@destroy');
