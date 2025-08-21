<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppUserPermission;
use App\Models\AppUser;
use Faker\Factory as Faker;

class AppUserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $userIds = AppUser::pluck('appuserid')->toArray();

        if (empty($userIds)) {
            $this->command->warn('⚠️ Please seed app users first.');
            return;
        }

        $permissions = ['create', 'read', 'update', 'delete', 'admin'];

        $userPermissions = [];

        for ($i = 0; $i < 10; $i++) {
            $userPermissions[] = [
                'appuserid'      => $faker->randomElement($userIds),
                'userpermission' => $faker->randomElement($permissions),
                'created_at'     => now(),
                'updated_at'     => now(),
            ];
        }

        AppUserPermission::insert($userPermissions);

        $this->command->info('✅ 10 app user permissions have been inserted.');
    }
}
