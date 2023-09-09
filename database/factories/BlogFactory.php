<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Blog;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Blog::class;
    protected $table = 'blogs';
    // public function newModel(array $attributes = []) {
    //     return Blog::new()($attributes);
    // }

    public function definition(): array
    {
        return [
            'title' => fake()->unique()->realText(50),
            'body' => fake()->paragraphs(5, true),
            'author_id' => fake()->numberBetween(1, 20),
            'date' => fake()->dateTime()
         ];
    }
}
