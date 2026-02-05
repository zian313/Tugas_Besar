<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Pembeli (User)
        User::create([
            'name' => 'Pembeli User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'pembeli',
        ]);
    }
}
