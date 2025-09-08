<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;
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
            'categoryId' => Category::factory(),
            'userId' => User::factory(),
            'authorId' => fake()->randomNumber(),
            'parentId' => fake()->optional()->randomNumber(),
            'title' => fake()->sentence(6),
            'metaTitle' => fake()->sentence(8),
            'slug' => Str::slug(fake()->sentence(3)),
            'summary' => fake()->text(200),
            'published' => fake()->boolean(),
            'createdAt' => fake()->dateTime(),
            'updatedAt' => fake()->dateTime(),
            'publishedAt' => fake()->optional()->dateTime(),
            'content' => fake()->paragraphs(5, true),
        ];
    }
}
