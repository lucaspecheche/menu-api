<?php

namespace App\Http\Resources;

use App\Models\Order;

class OrdersByDay
{
    public static function get(): array
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
            'series' => array_values($data)
        ];
    }
}
