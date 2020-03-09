<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Collection;
use function foo\func;

class ReportController extends Controller
{
    public function salesPerDay()
    {
        $data = [];

        $orders = Order::query()->orderBy('createdAt')->get();

        foreach ($orders as $order) {
            $date = $order->createdAt->format('Y-m-d');

            isset($data[$date])
                ? ++$data[$date]
                : ($data[$date] = 1);

        }

        return [
            'categories' => array_keys($data),
            'data' => array_values($data)

        ];
    }
}
