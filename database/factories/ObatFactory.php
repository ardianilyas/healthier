<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->word(),
            'harga' => fake()->numberBetween(5000, 200000),
            'satuan' => fake()->word(),
            'keterangan' => fake()->sentence() 
        ];
    }
}
