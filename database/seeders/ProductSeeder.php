<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'nom' => 'Croquettes pour chien',
                'prix' => 29.99,
                'descriptionCourte' => 'Croquettes premium pour chien adulte',
                'descriptionLongue' => 'Des croquettes équilibrées et savoureuses pour la santé de votre chien.',
                'image' => 'https://images.unsplash.com/photo-1518717758536-85ae29035b6d?w=400',
                'quantite' => 50,
                'type_animal_id' => 1,
                'pilier_id' => 1,
            ],
            [
                'nom' => 'Jouet à mâcher pour chien',
                'prix' => 9.99,
                'descriptionCourte' => 'Jouet résistant pour chien',
                'descriptionLongue' => 'Un jouet solide pour occuper et renforcer la mâchoire de votre chien.',
                'image' => 'https://images.unsplash.com/photo-1508672019048-805c876b67e2?w=400',
                'quantite' => 30,
                'type_animal_id' => 1,
                'pilier_id' => 2,
            ],
            [
                'nom' => 'Litière agglomérante pour chat',
                'prix' => 14.99,
                'descriptionCourte' => 'Litière minérale pour chat',
                'descriptionLongue' => 'Litière absorbante et sans odeur pour le confort de votre chat.',
                'image' => 'https://images.unsplash.com/photo-1518715308788-3005759c61d4?w=400',
                'quantite' => 40,
                'type_animal_id' => 2,
                'pilier_id' => 1,
            ],
            [
                'nom' => 'Arbre à chat design',
                'prix' => 59.99,
                'descriptionCourte' => 'Arbre à chat avec griffoir et plateformes',
                'descriptionLongue' => 'Un arbre à chat robuste pour jouer, grimper et se reposer.',
                'image' => 'https://images.unsplash.com/photo-1518715308788-3005759c61d4?w=400',
                'quantite' => 15,
                'type_animal_id' => 2,
                'pilier_id' => 2,
            ],
        ];

        foreach ($products as $productData) {
            \App\Models\Produit::create($productData);
        }
    }
}
