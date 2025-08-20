<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvoiceDetail;
use App\Models\Invoice;
use App\Models\Menu;
use Faker\Factory as Faker;

class InvoiceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $invoiceIds = Invoice::pluck('invoiceid')->toArray();
        $menuIds    = Menu::pluck('menuid')->toArray();

        if (empty($invoiceIds) || empty($menuIds)) {
            $this->command->warn('⚠️ Please seed invoices and menus first.');
            return;
        }

        $details = [];

        for ($i = 0; $i < 10; $i++) {
            $details[] = [
                'invoiceid'     => $faker->randomElement($invoiceIds),
                'menuid'        => $faker->randomElement($menuIds),
                'orderquantity' => $faker->numberBetween(1, 10),
                'orderprice'    => $faker->randomFloat(2, 1, 100),
                'discount'      => $faker->randomFloat(2, 0, 20),
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
        }

        InvoiceDetail::insert($details);
    }
}
