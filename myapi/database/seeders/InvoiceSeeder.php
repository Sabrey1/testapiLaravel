<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;
use App\Models\Customers; 
use Faker\Factory as Faker;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get existing customer IDs
        $customerIds = Customers::pluck('customerid')->toArray(); // <- matches your table

        if (empty($customerIds)) {
            $this->command->warn('⚠️ No customers found. Please seed customers first.');
            return;
        }

        $invoices = [];

        for ($i = 0; $i < 10; $i++) {
            $invoices[] = [
                'ishidden'    => 0,
                'customerid' => $faker->randomElement($customerIds), // <- use customerid
                'orderdate'   => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
                'vat'         => $faker->randomFloat(2, 0, 50),
                'memo'        => $faker->optional()->sentence(6),
                'ispaid'      => $faker->boolean(50),
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }

        Invoice::insert($invoices);
    }
}
