<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminExists = \App\Models\User::where('email', 'admin@admin.com')->exists();

        if (!$adminExists) {
            \App\Models\User::create([
                'name' => 'Administrator',
                'first_name' => 'Admin',
                'last_name' => 'System',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'phone' => '+33 1 23 45 67 89',
                'birth_date' => '1990-01-01',
                'address' => '123 Admin Street, Admin City',
                'role_id' => 2,
            ]);
        }
    }
}
