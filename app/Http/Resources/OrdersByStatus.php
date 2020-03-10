<?php

namespace App\Http\Resources;

use App\Models\Order;

class OrdersByStatus
{
    public static function get(): array
    {
        $data = [];

        $orders = Order::query()->orderBy('status')->get();

        foreach ($orders as $order) {
            $status = trans("status.$order->status");

            isset($data[$status])
                ? ++$data[$status]
                : ($data[$status] = 1);
        }

        return [
            'labels' => array_keys($data),
            'series' => array_values($data)
        ];
    }
}
