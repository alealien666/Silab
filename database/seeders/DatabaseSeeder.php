<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Alat_Tambahan;
use App\Models\Lab;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // user
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
        // end

        // category
        Category::create([
            'category' => 'Microbiologi',
            'deskripsi' => 'biologi'
        ]);
        Category::create([
            'category' => 'Kimia',
            'deskripsi' => 'kimia'
        ]);
        Category::create([
            'category' => 'Fisika',
            'deskripsi' => 'fisika'
        ]);
        // end

        Alat_Tambahan::factory()->count(20)->create();
        Lab::factory()->count(9)->create();
    }
}
