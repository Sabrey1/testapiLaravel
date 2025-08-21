<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CustomersSeeder::class,
            AppUserSeeder::class,
            AppUserPermissionSeeder::class,
            MenuTypeSeeder::class,
            MenuSeeder::class,
            InvoiceSeeder::class,
            InvoiceDetailSeeder::class,
        ]);
    }
}
