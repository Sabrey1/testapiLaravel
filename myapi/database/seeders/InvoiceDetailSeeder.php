<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvoiceDetail;
use App\Models\Invoice;
use Faker\Factory as Faker;

class InvoiceDetailSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $invoiceIds = Invoice::pluck('invoiceid')->toArray();

        if (empty($invoiceIds)) {
            $this->command->warn('⚠️ No invoices found. Seed invoices first.');
            return;
        }

        $invoiceDetails = [];

        for ($i = 0; $i < 10; $i++) {
            $invoiceDetails[] = [
                'invoiceid'   => $faker->randomElement($invoiceIds),
                'productname' => $faker->word(),
                'quantity'    => $faker->numberBetween(1, 10),
                'price'       => $faker->randomFloat(2, 5, 100),
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }

        InvoiceDetail::insert($invoiceDetails);
        $this->command->info('✅ 10 invoice details inserted.');
    }
}
