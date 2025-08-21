<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuType;
use Faker\Factory as Faker;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

       $menuTypeIds = MenuType::pluck('menutypeid'); // adjust column if different

        if (empty($menuTypeIds)) {
            $this->command->warn('⚠️ Please seed menu types first.');
            return;
        }

        $menus = [];

        for ($i = 0; $i < 10; $i++) {
            $menus[] = [
                'menutypeid'     => $faker->randomElement($menuTypeIds),
                'menuname'       => $faker->words(2, true),
                'itemdescription'=> $faker->sentence(),
                'saleprice'      => $faker->randomFloat(2, 5, 100), // price between 5.00 and 100.00
                'ishidden'       => $faker->boolean(),
                'created_at'     => now(),
                'updated_at'     => now(),
            ];
        }

        Menu::insert($menus);
    }
}
