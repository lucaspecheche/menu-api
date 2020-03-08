<?php

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Customer::all()->each(static function(Customer $customer) {
            $orders = factory(Order::class, 3)->make();

            foreach ($orders as $order) {
                $order->customer()->associate($customer);
                $order->save();
            }
        });
    }
}
