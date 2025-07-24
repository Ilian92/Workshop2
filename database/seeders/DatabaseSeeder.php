<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            RoleSeeder::class,
            AdminUserSeeder::class,
            TypeAnimalSeeder::class,
            PilierSeeder::class,
            ProduitSeeder::class,
        ]);

        \App\Models\Animal::factory(25)->create();

        $this->call([
            ProduitSeeder::class,
        ]);

        $this->call([
            CommandeSeeder::class,
        ]);

        $this->call([
            ProduitCommandeSeeder::class,
        ]);
    }
}
