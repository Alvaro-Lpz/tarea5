<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'ruta_imagen' => $this->faker->imageUrl(200, 200),
            'password' => bcrypt('password'),
            'rol' => $this->faker->randomElement(['usuario', 'editor', 'admin']),
        ];
    }
}
