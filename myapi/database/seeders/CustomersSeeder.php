<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Customer;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $customers = [];

        for ($i = 0; $i < 10; $i++) {
            $customers[] = [
                'customername' => $faker->name,
                'companyname'  => $faker->company,
                'phone'        => $faker->phoneNumber,
                'email'        => $faker->unique()->safeEmail,
                'address'      => $faker->address,
                'ishidden'     => 0,
                'isdefault'    => 0,
                'created_at'   => now(),
                'updated_at'   => now(),
            ];
        }

        Customer::insert($customers);
    }
    
}