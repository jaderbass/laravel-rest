<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realText($maxNbChars = 10, $indexSize = 2),
            'band' => fake()->realText($maxNbChars = 10, $indexSize = 2),
            'labels_id_ref' => fake()->numberBetween(1, 4),
        ];
    }
}
