<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrdersByDay;
use App\Http\Resources\OrdersByStatus;
use App\Http\Resources\TotalReport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function ordersByDay()
    {
        return $this->response(OrdersByDay::get());
    }

    public function ordersByStatus()
    {
        return $this->response(OrdersByStatus::get());
    }

    public function total(Request $request)
    {
        return $this->response(TotalReport::get($request->all()));
    }
}
