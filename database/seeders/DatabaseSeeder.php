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
        // Créer les utilisateurs
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seeder dans le bon ordre (respecter les dépendances)
        $this->call([
            TypeAnimalSeeder::class,
            PilierSeeder::class,
        ]);

        // Créer les animaux (dépendent des types d'animaux et des utilisateurs)
        \App\Models\Animal::factory(25)->create();

        // Créer les produits (dépendent des types d'animaux et des piliers)
        $this->call([
            ProduitSeeder::class,
        ]);

        // Créer les commandes (dépendent des utilisateurs)
        $this->call([
            CommandeSeeder::class,
        ]);

        // Créer les produits-commandes (dépendent des commandes et des produits)
        $this->call([
            ProduitCommandeSeeder::class,
        ]);
    }
}
