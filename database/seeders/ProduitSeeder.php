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
            [
                'nom' => 'Clicker de dressage',
                'prix' => 1200,
                'descriptionCourte' => 'Outil de dressage professionnel',
                'descriptionLongue' => 'Clicker ergonomique pour un dressage efficace et bienveillant de votre chien',
                'image' => 'https://m.media-amazon.com/images/I/61dByXswvRL.jpg',
                'quantite' => 50,
                'type_animal_id' => 1,
                'pilier_id' => 1,
            ],
            [
                'nom' => 'Livre de dressage canin',
                'prix' => 2500,
                'descriptionCourte' => 'Guide complet du dressage',
                'descriptionLongue' => 'Manuel complet avec techniques modernes de dressage pour tous les âges',
                'image' => 'https://m.media-amazon.com/images/I/81T0sSBJJWL._UF1000,1000_QL80_.jpg',
                'quantite' => 30,
                'type_animal_id' => 1,
                'pilier_id' => 1,
            ],

            [
                'nom' => 'Brosse à dents canine',
                'prix' => 800,
                'descriptionCourte' => 'Hygiène dentaire pour chien',
                'descriptionLongue' => 'Brosse spécialement conçue pour l\'hygiène dentaire des chiens',
                'image' => 'https://content.pearl.fr/media/cache/default/article_ultralarge_high_nocrop/shared/images/articles/N/NX5/kit-d-hygiene-dentaire-canine-brosses-et-dentifrice-ref_NX5750_2.jpg',
                'quantite' => 40,
                'type_animal_id' => 1,
                'pilier_id' => 2,
            ],
            [
                'nom' => 'Complément alimentaire vitamines',
                'prix' => 3200,
                'descriptionCourte' => 'Vitamines pour chien',
                'descriptionLongue' => 'Complément riche en vitamines pour maintenir la santé de votre chien',
                'image' => 'https://www.animigo.fr/assets/animigo/animigo.fr/images/product/package/multivitamins-and-minerals-for-dogs-cat-fr-front-01.webp',
                'quantite' => 25,
                'type_animal_id' => 1,
                'pilier_id' => 2,
            ],

            [
                'nom' => 'Balle interactive',
                'prix' => 1500,
                'descriptionCourte' => 'Jouet stimulant pour chien',
                'descriptionLongue' => 'Balle interactive qui stimule l\'intelligence et l\'activité physique',
                'image' => 'https://m.media-amazon.com/images/I/41r+txz1gRL._SL500_.jpg',
                'quantite' => 60,
                'type_animal_id' => 1,
                'pilier_id' => 3,
            ],
            [
                'nom' => 'Frisbee résistant',
                'prix' => 1800,
                'descriptionCourte' => 'Frisbee pour jeu en extérieur',
                'descriptionLongue' => 'Frisbee ultra-résistant pour des heures de jeu en extérieur',
                'image' => 'https://media.zooplus.com/bilder/2/800/27423_PLA_Trixie_Dog_Activity_Disc_Durchmesser_23_cm_2.jpg',
                'quantite' => 35,
                'type_animal_id' => 1,
                'pilier_id' => 3,
            ],

            [
                'nom' => 'Arbre à chat éducatif',
                'prix' => 8500,
                'descriptionCourte' => 'Arbre à chat multi-niveaux',
                'descriptionLongue' => 'Arbre à chat avec griffoirs et espaces de jeu pour éduquer votre chat',
                'image' => 'https://www.cdiscount.com/pdt2/8/3/4/1/550x550/yah1703660637834/rw/yaheetech-arbre-a-chat-avec-2-niches-3-plateformes.jpg',
                'quantite' => 15,
                'type_animal_id' => 2,
                'pilier_id' => 1,
            ],
            [
                'nom' => 'Spray éducatif anti-griffes',
                'prix' => 1200,
                'descriptionCourte' => 'Spray répulsif pour meubles',
                'descriptionLongue' => 'Spray naturel pour éduquer votre chat à ne pas griffer les meubles',
                'image' => 'https://m.media-amazon.com/images/I/51vvFCzhYhL._UF1000,1000_QL80_.jpg',
                'quantite' => 45,
                'type_animal_id' => 2,
                'pilier_id' => 1,
            ],

            [
                'nom' => 'Croquettes premium chat',
                'prix' => 4200,
                'descriptionCourte' => 'Alimentation haut de gamme',
                'descriptionLongue' => 'Croquettes premium riches en protéines pour la santé de votre chat',
                'image' => 'https://ik.imagekit.io/yynn3ntzglc/production/catalog/products/011009/3.jpg',
                'quantite' => 50,
                'type_animal_id' => 2,
                'pilier_id' => 4,
            ],
            [
                'nom' => 'Fontaine à eau chat',
                'prix' => 6500,
                'descriptionCourte' => 'Fontaine d\'eau circulante',
                'descriptionLongue' => 'Fontaine à eau avec filtre pour encourager l\'hydratation de votre chat',
                'image' => 'https://media.zooplus.com/bilder/7/800/187697_hagencontainer_catit_pixi_trinkbrunnen_pink_hs_11_7.jpg',
                'quantite' => 20,
                'type_animal_id' => 2,
                'pilier_id' => 4,
            ],
        ];

        foreach ($produits as $produit) {
            \App\Models\Produit::create($produit);
        }
    }
}
