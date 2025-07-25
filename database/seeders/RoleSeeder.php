<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Role::firstOrCreate([
            'nom' => 'user'
        ], [
            'description' => 'Utilisateur standard avec accès limité'
        ]);

        \App\Models\Role::firstOrCreate([
            'nom' => 'admin'
        ], [
            'description' => 'Administrateur avec tous les droits'
        ]);
    }
}
