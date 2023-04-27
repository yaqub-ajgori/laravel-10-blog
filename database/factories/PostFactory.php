<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
        $title = fake()->realText(50);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => fake()->realText(500),
            'thumbnail' => fake()->imageUrl(1000, 500),
            'published_at' => now(),
            'is_published' => true,
            'user_id' => 1,
        ];
    }
}
