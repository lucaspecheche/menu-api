<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Http\Response;
use Tests\TestCase;

class CustomerFeatureTest extends TestCase
{
    protected $endpoint = 'customers';

    /** @test */
    public function should_return_status_200_in_the_index(): void
    {
        $response = $this->get($this->endpoint);
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function should_return_correct_structure_in_the_index(): void
    {
        factory(Customer::class, 2)->create();

        $response = $this->get($this->endpoint);

        $response->assertJsonStructure([
            'message',
            'data' => [
                0 => [
                    'id', 'firstName',
                    'lastName', 'email',
                    'createdAt'
                ]
            ]
        ]);
    }

    /** @test */
    public function should_create_new_customer(): void
    {
        $payload = [
            'email'     => 'mail@mail.com',
            'firstName' => 'Pecheche',
            'lastName'  => 'Lima',
            'createdAt' => now()->toDateTimeString()
        ];

        $response = $this->post($this->endpoint, $payload);

        $response->assertStatus(Response::HTTP_CREATED);

        $this->assertEquals(
            trans('messages.customer.created'),
            $response->json('message')
        );
    }

    /** @test */
    public function should_update_customer(): void
    {
        $customer = factory(Customer::class)->create();

        $payload = [
            'email'     => 'mail@mail.com',
            'firstName' => 'Pecheche',
            'lastName'  => 'Lima'
        ];

        $response = $this->put("$this->endpoint/$customer->id", $payload)->json('data');

        $this->assertEquals($payload['email'], $response['email']);
        $this->assertEquals($payload['firstName'], $response['firstName']);
        $this->assertEquals($payload['lastName'], $response['lastName']);
    }

    /** @test */
    public function should_show_customer(): void
    {
        $customer = factory(Customer::class)->create();
        $response = $this->get("$this->endpoint/$customer->id");

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure([
            'data' => [
                'id', 'firstName',
                'lastName', 'email',
                'createdAt'
            ]
        ]);
    }

    /** @test */
    public function should_return_exception_when_customer_not_found_in_the_show(): void
    {
        $response = $this->get("$this->endpoint/9999");
        $response->assertStatus(Response::HTTP_NOT_FOUND);

        $response->assertJsonStructure([
            'shortMessage',
            'message'
        ]);
    }

    /** @test */
    public function should_delete_customer(): void
    {
        $customer = factory(Customer::class)->create();
        $response = $this->delete("$this->endpoint/$customer->id");

        $response->assertStatus(Response::HTTP_OK);
        $this->assertEquals(
            trans('messages.customer.deleted'),
            $response->json('message')
        );
    }

    /** @test */
    public function should_return_status_422_when_invalid_data(): void
    {
        $response = $this->post($this->endpoint, [
            'fake' => 'fake'
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
