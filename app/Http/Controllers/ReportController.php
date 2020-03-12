<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Http\Resources\OrdersByDay;
use App\Http\Resources\OrdersByStatus;
use App\Http\Resources\TotalReport;

class ReportController extends Controller
{
    public function ordersByDay(ReportRequest $request)
    {
        return $this->response(OrdersByDay::get($request->validated()));
    }

    public function ordersByStatus(ReportRequest $request)
    {
        return $this->response(OrdersByStatus::get($request->validated()));
    }

    public function total(ReportRequest $request)
    {
        return $this->response(TotalReport::get($request->validated()));
    }
}
