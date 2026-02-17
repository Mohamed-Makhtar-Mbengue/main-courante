<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
                'role_id' => 1,
            ]
        );

        User::firstOrCreate(
            ['email' => 'miadmin@example.com'],
            [
                'name' => 'Mi-admin',
                'password' => bcrypt('password'),
                'role_id' => 2,
            ]
        );

        User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Utilisateur',
                'password' => bcrypt('password'),
                'role_id' => 3,
            ]
        );
    }
}
