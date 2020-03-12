<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Response;
use Tests\TestCase;

class OrderFeatureTest extends TestCase
{
    protected $endpoint = 'orders';

    /** @test */
    public function should_return_status_200_in_the_index(): void
    {
        $response = $this->get($this->endpoint);
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function should_return_correct_structure_in_the_index(): void
    {
        $this->newOrder();

        $response = $this->get($this->endpoint);

        $response->assertJsonStructure([
            'message',
            'data' => [
                'data' => [
                    0 => [
                        'id',
                        'value',
                        'status',
                        'customerId',
                        'customer' => [
                            'firstName',
                            'lastName',
                            'email'
                        ]
                    ]
                ]
            ]
        ]);
    }

    /** @test */
    public function should_create_new_order(): void
    {
        $customer = factory(Customer::class)->create();

        $payload = [
            'value'      => 150.00,
            'date'       => now()->toDateTimeString(),
            'customerId' => $customer->id,
            'status'     => Order::PENDING
        ];

        $response = $this->post($this->endpoint, $payload);

        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertEquals(
            trans('messages.order.created'),
            $response->json('message')
        );
    }

    /** @test */
    public function should_update_order(): void
    {
        $order    = $this->newOrder();
        $customer = factory(Customer::class)->create();

        $payload = [
            'value'      => 160.00,
            'date'       => now()->toDateTimeString(),
            'customerId' => $customer->id,
            'status'     => Order::PENDING
        ];

        $response = $this->put("$this->endpoint/$order->id", $payload)->json('data');

        $this->assertEquals($payload['value'], $response['value']);
        $this->assertEquals($payload['customerId'], $response['customerId']);
        $this->assertEquals($payload['status'], $response['status']);
    }

    /** @test */
    public function should_show_order(): void
    {
        $order    = $this->newOrder();
        $response = $this->get("$this->endpoint/$order->id");

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'value',
                'status',
                'customerId',
                'createdAt'
            ]
        ]);
    }

    /** @test */
    public function should_return_exception_when_order_not_found_in_the_show(): void
    {
        $response = $this->get("$this->endpoint/9999");
        $response->assertStatus(Response::HTTP_NOT_FOUND);

        $response->assertJsonStructure([
            'shortMessage',
            'message'
        ]);
    }

    /** @test */
    public function should_delete_order(): void
    {
        $order    = $this->newOrder();
        $response = $this->delete("$this->endpoint/$order->id");

        $response->assertStatus(Response::HTTP_OK);
        $this->assertEquals(
            trans('messages.order.deleted'),
            $response->json('message')
        );
    }

    /** @test */
    public function should_return_status_422_when_customerId_invalid(): void
    {
        $response = $this->post($this->endpoint, [
            'value'      => 160.00,
            'date'       => now()->toDateTimeString(),
            'customerId' => 9999,
            'status'     => Order::PENDING
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /** @test */
    public function should_return_status_422_when_status_invalid(): void
    {
        $customer = factory(Customer::class)->create();

        $response = $this->post($this->endpoint, [
            'value'      => 160.00,
            'date'       => now()->toDateTimeString(),
            'customerId' => $customer->id,
            'status'     => 'FAKE'
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    private function newOrder()
    {
        $customer = factory(Customer::class)->create();
        $order    = factory(Order::class)->make();
        $order->customer()->associate($customer);

        $order->save();
        return $order;
    }
}
