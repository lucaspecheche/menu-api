<?php

namespace App\Http\Resources;

use App\Models\Order;

class OrdersByDay
{
    public static function get(array $filters = []): array
    {
        $data = [];

        $orders = Order::filter($filters)->orderBy('createdAt')->get();

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
