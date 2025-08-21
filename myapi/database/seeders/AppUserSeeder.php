<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppUser;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class AppUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = [];

        for ($i = 1; $i <= 10; $i++) {
    $users[] = [
        'username'   => $faker->unique()->userName,
        'email'      => $faker->unique()->safeEmail,  // <-- add this
        'password'   => Hash::make('password123'), // default password
        'created_at' => now(),
        'updated_at' => now(),
         
    ];
}

        AppUser::insert($users);

        $this->command->info('✅ 10 app users have been inserted.');
    }
}
