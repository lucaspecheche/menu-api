<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/orders-by-day', ReportController::class . '@ordersByDay');
Route::get('/orders-by-status', ReportController::class . '@ordersByStatus');
Route::get('/orders-by-products', ReportController::class . '@ordersByStatus');
Route::get('/latest-orders', ReportController::class . '@latestOrders');

Route::get('total', ReportController::class . '@total');
