<?php

namespace App\Http\Resources;

use App\Models\Customer;
use App\Models\Order;

class TotalReport
{
    public static function get(array $filters = []): array
    {
        return [
            'customers' => Customer::filter($filters)->count(),
            'orders'    => Order::filter($filters)->count()
        ];
    }
}
