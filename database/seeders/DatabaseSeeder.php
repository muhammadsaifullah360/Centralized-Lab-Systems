<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Saif',
            'email' => 'admin@5512',
            'password' => Hash::make('admin123'),
            'phone' => '03041302417',
            'role' => 'admin'
        ]);
        User::factory()->create([
            'name' => 'Ali Raza',
            'email' => 'operator@gmail.com',
            'password' => Hash::make('admin123'),
            'phone' => '03041302417',
            'role' => 'operator'
        ]);
    }
}
