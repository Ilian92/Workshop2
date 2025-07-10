<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitCommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $commandes = \App\Models\Commande::all();
        $produits = \App\Models\Produit::all();

        foreach ($commandes as $commande) {
            // Chaque commande a entre 1 et 4 produits
            $nombreProduits = fake()->numberBetween(1, 4);
            $produitsSelectionnes = $produits->random($nombreProduits);

            $totalCommande = 0;

            foreach ($produitsSelectionnes as $produit) {
                $quantite = fake()->numberBetween(1, 3);
                $prixUnitaire = $produit->prix;

                \App\Models\ProduitCommande::create([
                    'quantite' => $quantite,
                    'prixUnitaire' => $prixUnitaire,
                    'commande_id' => $commande->id,
                    'produit_id' => $produit->id,
                ]);

                $totalCommande += $quantite * $prixUnitaire;
            }

            // Mettre à jour le total de la commande
            $commande->update(['total' => $totalCommande]);
        }
    }
}
