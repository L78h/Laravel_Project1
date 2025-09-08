<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'parentId' => fake()->optional()->randomNumber(),
                'title' => fake()->words(3, true),
                'metaTitle' => fake()->sentence(6),
                'slug' => Str::slug(fake()->words(3, true)),
                'content' => fake()->paragraphs(3, true),
                'created_at' => now(),
                'updated_at' => now(),
        ];
    }
}
