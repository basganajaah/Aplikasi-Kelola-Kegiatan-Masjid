<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert 10 admin users
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => "Admin User $i",
                'email' => "admin$i@example.com",
                'role' => 'admin',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insert the remaining default users
        for ($i = 11; $i <= 50; $i++) { // Assuming a total of 50 users
            DB::table('users')->insert([
                'name' => "Default User $i",
                'email' => "user$i@example.com",
                'role' => 'user',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
