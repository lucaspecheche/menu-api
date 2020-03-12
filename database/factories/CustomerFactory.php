<?php

/**
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, static function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName'  => $faker->lastName,
        'email'     => $faker->email,
        'createdAt' => $faker->dateTimeBetween('-5 months', 'now')
    ];
});
