<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $products = [];

        for ($i = 0; $i < 10; $i++) {
            $products[] = [
                'name'        => $faker->word(),
                'stock'       => $faker->numberBetween(1, 100),
                'price'       => $faker->randomFloat(2, 1, 1000),
                'image'       => null, // or $faker->imageUrl(200, 200)
                'description' => $faker->sentence(),
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }

        Product::insert($products);
    }
}
