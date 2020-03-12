<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Order;
use Tests\TestCase;

class ReportFeatureTest extends TestCase
{
    protected $endpoint = 'reports';

    /** @test */
    public function should_return_correct_orders_by_status(): void
    {
        $order = $this->newOrder();

        $response = $this->get("$this->endpoint/orders-by-status");

        $this->assertEquals([
            'labels' => [0 => trans("status.$order->status")],
            'series' => [0 => 1]
        ], $response->json('data'));
    }

    /** @test */
    public function should_return_correct_orders_by_day(): void
    {
        $order = $this->newOrder();

        $response = $this->get("$this->endpoint/orders-by-day");

        $this->assertEquals([
            'categories' => [0 => $order->createdAt->format('Y-m-d')],
            'series' => [0 => 1]
        ], $response->json('data'));
    }

    /** @test */
    public function should_return_correct_total(): void
    {
        $this->newOrder();
        $this->newOrder();

        $response = $this->get("$this->endpoint/total");

        $this->assertEquals([
            'customers' => 2,
            'orders'    => 2
        ], $response->json('data'));
    }

    protected function newOrder(): Order
    {
        $customer = factory(Customer::class)->create();
        $order    = factory(Order::class)->make();

        $order->customer()->associate($customer);
        $order->save();

        return $order;
    }
}
