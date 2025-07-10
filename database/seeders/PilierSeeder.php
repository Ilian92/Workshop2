<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PilierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $piliers = [
            [
                'nom' => 'éducation',
                'descriptionCourte' => 'Dressage et apprentissage pour votre animal'
            ],
            [
                'nom' => 'santé',
                'descriptionCourte' => 'Soins vétérinaires et bien-être de votre animal'
            ],
            [
                'nom' => 'activité',
                'descriptionCourte' => 'Exercices et jeux pour maintenir votre animal en forme'
            ],
            [
                'nom' => 'alimentation',
                'descriptionCourte' => 'Nutrition équilibrée et adaptée à votre animal'
            ],
            [
                'nom' => 'lifestyle',
                'descriptionCourte' => 'Accessoires et confort pour votre animal'
            ],
            [
                'nom' => 'compréhension émotionnelle de l\'animal',
                'descriptionCourte' => 'Comprendre et gérer les émotions de votre animal'
            ]
        ];

        foreach ($piliers as $pilier) {
            \App\Models\Pilier::create($pilier);
        }
    }
}
