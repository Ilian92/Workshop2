<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();

        foreach ($users as $user) {
            // Chaque utilisateur a entre 1 et 3 commandes
            $nombreCommandes = fake()->numberBetween(1, 3);

            for ($i = 0; $i < $nombreCommandes; $i++) {
                \App\Models\Commande::create([
                    'status' => fake()->randomElement(['pending', 'processing', 'shipped', 'delivered', 'cancelled']),
                    'user_id' => $user->id,
                    'date_commande' => fake()->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
                    'total' => fake()->numberBetween(2000, 15000), // Prix en centimes
                    'adresse_livraison' => fake()->address(),
                    'adresse_facturation' => fake()->optional()->address(),
                ]);
            }
        }
    }
}
