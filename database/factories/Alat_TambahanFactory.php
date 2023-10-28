<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alat_Tambahan>
 */
class Alat_TambahanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "jenis_alat" => fake()->sentence(),
            "status" => $this->faker->randomElement(['tersedia', 'di gunakan']),
            "harga" => fake()->numberBetween(500000, 1000000),
            "category_id" => mt_rand(1, 3),
        ];
    }
}
