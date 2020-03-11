<?php

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        factory(Customer::class, 100)->create();
    }
}
