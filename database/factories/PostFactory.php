<?php

namespace Database\Factories;

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
            'title' => fake()->sentence(mt_rand(2, 8)),
            'user_id' => mt_rand(1, 1),
            'category_id' => 1,
            'slug' => fake()->slug(),
            'excerpt' => fake()->paragraph(),
            // 'body' => '<p>' . implode('</p><p>', fake()->paragraphs(mt_rand(10, 25))) . '</p>',
            'body' => collect(fake()->paragraphs(mt_rand(10, 25)))
                ->map(function ($p) {
                    return "<p>$p</p>";
                })
                ->implode(''),
        ];
    }
}
