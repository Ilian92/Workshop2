<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produits = [
            // Produits pour chiens - Éducation
            [
                'nom' => 'Clicker de dressage',
                'prix' => 1200,
                'descriptionCourte' => 'Outil de dressage professionnel',
                'descriptionLongue' => 'Clicker ergonomique pour un dressage efficace et bienveillant de votre chien',
                'image' => 'clicker-dressage.jpg',
                'quantite' => 50,
                'type_animal_id' => 1, // Chien
                'pilier_id' => 1, // éducation
            ],
            [
                'nom' => 'Livre de dressage canin',
                'prix' => 2500,
                'descriptionCourte' => 'Guide complet du dressage',
                'descriptionLongue' => 'Manuel complet avec techniques modernes de dressage pour tous les âges',
                'image' => 'livre-dressage.jpg',
                'quantite' => 30,
                'type_animal_id' => 1, // Chien
                'pilier_id' => 1, // éducation
            ],

            // Produits pour chiens - Santé
            [
                'nom' => 'Brosse à dents canine',
                'prix' => 800,
                'descriptionCourte' => 'Hygiène dentaire pour chien',
                'descriptionLongue' => 'Brosse spécialement conçue pour l\'hygiène dentaire des chiens',
                'image' => 'brosse-dents-chien.jpg',
                'quantite' => 40,
                'type_animal_id' => 1, // Chien
                'pilier_id' => 2, // santé
            ],
            [
                'nom' => 'Complément alimentaire vitamines',
                'prix' => 3200,
                'descriptionCourte' => 'Vitamines pour chien',
                'descriptionLongue' => 'Complément riche en vitamines pour maintenir la santé de votre chien',
                'image' => 'vitamines-chien.jpg',
                'quantite' => 25,
                'type_animal_id' => 1, // Chien
                'pilier_id' => 2, // santé
            ],

            // Produits pour chiens - Activité
            [
                'nom' => 'Balle interactive',
                'prix' => 1500,
                'descriptionCourte' => 'Jouet stimulant pour chien',
                'descriptionLongue' => 'Balle interactive qui stimule l\'intelligence et l\'activité physique',
                'image' => 'balle-interactive.jpg',
                'quantite' => 60,
                'type_animal_id' => 1, // Chien
                'pilier_id' => 3, // activité
            ],
            [
                'nom' => 'Frisbee résistant',
                'prix' => 1800,
                'descriptionCourte' => 'Frisbee pour jeu en extérieur',
                'descriptionLongue' => 'Frisbee ultra-résistant pour des heures de jeu en extérieur',
                'image' => 'frisbee-chien.jpg',
                'quantite' => 35,
                'type_animal_id' => 1, // Chien
                'pilier_id' => 3, // activité
            ],

            // Produits pour chats - Éducation
            [
                'nom' => 'Arbre à chat éducatif',
                'prix' => 8500,
                'descriptionCourte' => 'Arbre à chat multi-niveaux',
                'descriptionLongue' => 'Arbre à chat avec griffoirs et espaces de jeu pour éduquer votre chat',
                'image' => 'arbre-chat-educatif.jpg',
                'quantite' => 15,
                'type_animal_id' => 2, // Chat
                'pilier_id' => 1, // éducation
            ],
            [
                'nom' => 'Spray éducatif anti-griffes',
                'prix' => 1200,
                'descriptionCourte' => 'Spray répulsif pour meubles',
                'descriptionLongue' => 'Spray naturel pour éduquer votre chat à ne pas griffer les meubles',
                'image' => 'spray-anti-griffes.jpg',
                'quantite' => 45,
                'type_animal_id' => 2, // Chat
                'pilier_id' => 1, // éducation
            ],

            // Produits pour chats - Alimentation
            [
                'nom' => 'Croquettes premium chat',
                'prix' => 4200,
                'descriptionCourte' => 'Alimentation haut de gamme',
                'descriptionLongue' => 'Croquettes premium riches en protéines pour la santé de votre chat',
                'image' => 'croquettes-premium-chat.jpg',
                'quantite' => 50,
                'type_animal_id' => 2, // Chat
                'pilier_id' => 4, // alimentation
            ],
            [
                'nom' => 'Fontaine à eau chat',
                'prix' => 6500,
                'descriptionCourte' => 'Fontaine d\'eau circulante',
                'descriptionLongue' => 'Fontaine à eau avec filtre pour encourager l\'hydratation de votre chat',
                'image' => 'fontaine-eau-chat.jpg',
                'quantite' => 20,
                'type_animal_id' => 2, // Chat
                'pilier_id' => 4, // alimentation
            ],
        ];

        foreach ($produits as $produit) {
            \App\Models\Produit::create($produit);
        }
    }
}
