<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $animalTypes = ['Chien', 'Chat', 'Lapin', 'Hamster', 'Oiseau', 'Poisson'];
        $dogBreeds = ['Labrador', 'Golden Retriever', 'Berger Allemand', 'Bulldog', 'Poodle'];
        $catBreeds = ['Siamois', 'Persan', 'Maine Coon', 'British Shorthair', 'Ragdoll'];
        $characters = ['Calme', 'Joueur', 'Énergique', 'Timide', 'Affectueux', 'Indépendant'];

        return [
            'user_id' => \App\Models\User::factory(),
            'nom' => fake()->firstName(),
            'race' => fake()->randomElement(array_merge($dogBreeds, $catBreeds)),
            'age' => fake()->numberBetween(1, 15),
            'dateNaissance' => fake()->date('Y-m-d', '-1 year'),
            'caractere' => fake()->randomElement($characters),
        ];
    }
}
