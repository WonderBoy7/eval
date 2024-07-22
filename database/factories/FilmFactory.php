<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->words(2, true),
            'synopsis' => $this->faker->sentences(4, true),
            'description' => $this->faker->sentence(5, false),
            'duree' => $this->faker->time('H:m:s', '03:00:00')
        ];
    }
}
