<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Customers;  

class CustomersSeeder extends Seeder   // <-- rename the class here
{
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            Customers::create([
    'customername' => $faker->name,
    'companyname' => $faker->company,
    'phone' => $faker->phoneNumber,
    'email' => $faker->email,
    'address' => $faker->address,
    'ishidden' => 0,
]);
        }
    }
}
