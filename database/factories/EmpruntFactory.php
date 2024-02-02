<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmpruntFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'livre_id'=>fake()->numberBetween(1,10),
            'date_emprunt'=>fake()->date(),
            'date_retour'=>fake()->date(),

        ];
    }
}
