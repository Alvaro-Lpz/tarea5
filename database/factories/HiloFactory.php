<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hilo>
 */
class HiloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(),
            'descripcion' => $this->faker->text(200),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory()->create()->id, // hacemos que se elija un usuario existente aleatoriamente en lugar de crear uno nuevo
        ];
    }
}
