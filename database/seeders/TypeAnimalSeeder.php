<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeAnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TypeAnimal::create([
            'nom' => 'Chien',
            'description' => 'Fidèle compagnon, loyal et protecteur'
        ]);

        \App\Models\TypeAnimal::create([
            'nom' => 'Chat',
            'description' => 'Compagnon indépendant et affectueux'
        ]);
    }
}
