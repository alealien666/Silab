<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'password' => Hash::make('admin321'),
        ]);
        User::create([
            'name' => 'super-admin',
            'email' => 'super-admin@gmail.com',
            'role' => '0',
            'password' => Hash::make('super-admin'),
        ]);
    }
}
