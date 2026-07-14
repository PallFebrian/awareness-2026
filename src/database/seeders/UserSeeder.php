<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make(
                    env('ADMIN_SEED_PASSWORD', Str::random(40))
                ),
            ]
        );

        $admin->syncRoles(['super_admin']);

        $user = User::firstOrCreate(
            ['email' => 'user@admin.com'],
            [
                'name' => 'User Account',
                'password' => Hash::make(
                    env('USER_SEED_PASSWORD', Str::random(40))
                ),
            ]
        );

        $user->syncRoles(['user']);
    }
}
