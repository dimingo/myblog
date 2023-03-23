<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'Category_id' => Category::factory(),
            'title' => fake()->sentence(),
            'excerpt' => '<p>'. implode('</p><p>', fake()->paragraphs(3)).'</p>',
            'body' =>'<p>'. implode('</p><p>', fake()->paragraphs(6)).'</p>' ,
            'slug' => fake()->slug()
        ];
    }
}
