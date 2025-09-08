<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'postId' => Post::factory(),
            'parentid' => fake()->optional()->randomNumber(),
            'title' => fake()->sentence(3),
            'published' => fake()->boolean(),
            'createdAt' => fake()->dateTime(),
            'publishedAt' => fake()->optional()->dateTime(),
            'content' => fake()->paragraphs(2, true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
