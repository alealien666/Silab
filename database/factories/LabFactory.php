<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lab>
 */
class LabFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nama_lab" => fake()->sentence(),
            "slug" => fake()->slug(),
            "deskripsi" => fake()->paragraph(3, 5),
            "status" => $this->faker->randomElement(['tersedia', 'di gunakan']),
            "kapasitas" => fake()->numberBetween(15, 30),
            "category_id" => mt_rand(1, 3)
        ];
    }
}
