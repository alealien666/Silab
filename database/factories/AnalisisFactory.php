<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Analisis>
 */
class AnalisisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // "waktu_analisis" => fake()->time(),
            // "harga" => fake()->numberBetween(500000, 1000000),
            // "analisis" => fake()->sentence(),
            // "category_id" => mt_rand(1, 3),
            // "id_alat" => mt_rand(1, 3)
        ];
    }
}
