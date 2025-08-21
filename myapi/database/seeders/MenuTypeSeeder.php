<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuType;
use Faker\Factory as Faker;

class MenuTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $faker = Faker::create();
    $menuTypes = [];

    // Example: insert 5 menu types
    $names = ['Appetizer', 'Main Course', 'Dessert', 'Beverage', 'Salad'];

    foreach ($names as $name) {
        $menuTypes[] = [
            'typename'     => $name,
            'menutypename' => $name,
            'created_at'   => now(),
            'updated_at'   => now(),
        ];
    }

    // Or generate random ones
    for ($i = 0; $i < 5; $i++) {
        $word = $faker->word();
        $menuTypes[] = [
            'typename'     => $word,   // <-- add this
            'menutypename' => $word,
            'created_at'   => now(),
            'updated_at'   => now(),
        ];
    }

    MenuType::insert($menuTypes);

    $this->command->info('✅ Menu types have been inserted.');
}
}
