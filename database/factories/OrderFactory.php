<?php

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, static function (Faker $faker) {
    return [
        'status' => Order::STATUS_AVAILABLE[array_rand(Order::STATUS_AVAILABLE)],
        'value'  => $faker->randomFloat(2, 1, 1000),
    ];
});
