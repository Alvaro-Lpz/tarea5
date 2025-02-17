<?php

namespace Database\Factories;

use App\Models\Hilo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contenido' => $this->faker->paragraphs(3, true),
            'fecha_publicacion' => now(),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
            'hilo_id' => Hilo::inRandomOrder()->first()->id ?? Hilo::factory()->create()->id,
        ];
    }
}
