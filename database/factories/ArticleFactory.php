<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));
        return [
            'titulo' => fake()->unique()->words(random_int(1, 4), true),
            'contenido' => fake()->text(),
            'imagen' => 'articulos/' . fake()->picsum('public/storage/articulos', 640, 480, false),
            'estado' => fake()->randomElement(['PUBLICADO', 'BORRADOR']),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
