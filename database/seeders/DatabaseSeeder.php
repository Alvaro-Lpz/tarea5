<?php

namespace Database\Seeders;

use App\Models\Hilo;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Crear 10 usuarios y asignarles hilos y posts
        User::factory(10)->create()->each(function ($user) {
            // Cada usuario crea 2 hilos
            $hilos = Hilo::factory(2)->create(['user_id' => $user->id]);

            // Cada hilo tendrá posts creados por el mismo usuario
            $hilos->each(function ($hilo) use ($user) {
                $posts = Post::factory(3)->create([
                    'user_id' => $user->id,
                    'hilo_id' => $hilo->id,
                ]);

                // A cada post se le asignan entre 0 y 5 likes aleatorios
                $posts->each(function ($post) {
                    Like::factory(rand(0, 5))->create(['post_id' => $post->id]);
                });
            });
        });
    }
}
