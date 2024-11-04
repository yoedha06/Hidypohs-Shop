<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'phone' => '08111111111',
            'address' => 'Jl. Jalan',
            'role' => 'admin',
            'password' => bcrypt('admin'),
            'phone_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Customer',
            'phone' => '08222222222',
            'address' => 'Jl. Baru',
            'role' => 'customer',
            'password' => bcrypt('user'),
            'phone_verified_at' => now()
        ]);
    }
}
