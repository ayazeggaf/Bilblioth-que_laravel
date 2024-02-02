<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titre'=>fake()->name(),
            'annee_publication'=>fake()->date(),
            'nombre_page'=>fake()->numberBetween(40,300),
            'auteur_id'=>fake()->numberBetween(1,10)
        ];
    }
}
