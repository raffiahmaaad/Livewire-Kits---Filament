<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\UserRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Buat user Admin
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super.admin@gmail.com',
            'role' => UserRole::Admin, // <-- Atur rolenya menjadi Admin
        ]);

        // Buat user biasa (opsional, untuk pengujian)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => UserRole::User, // <-- Role default sudah 'user', ini hanya untuk menegaskan
        ]);
    }
}
