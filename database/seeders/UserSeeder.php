<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // ADMIN
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $admin->roles()->attach([1, 2]); // admin + mi-admin

        // MI-ADMIN
        $miadmin = User::create([
            'name' => 'Mi Admin',
            'email' => 'miadmin@example.com',
            'password' => bcrypt('password'),
        ]);
        $miadmin->roles()->attach(2); // mi-admin

        // USER SIMPLE
        $user = User::create([
            'name' => 'Utilisateur',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);
        $user->roles()->attach(3); // user
    }
}
