<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker; // Import Faker
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'hello',
            'email' => 'hello@example.com',
        ]);

        $faker = \faker\Factory::Create();
        $products = [];

        for ($i = 0; $i < 10; $i++) {
            $products[] = [
                'name' => $faker->name,
                'stock' => $faker->numberBetween(10,200),
                'price' => $faker->randomFloat(2, 10, 1000),  
                'image' => $faker->imageUrl(),
                'description' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Product::insert($products);
 
    }
}
