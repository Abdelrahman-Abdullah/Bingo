<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'title' => fake()->jobTitle(),
            'content' => fake()->paragraph(4),
            'thumbnail' => 'images/blog/post-default.jpg',
            'slug' => fake()->slug(),
            'is_published' => fake()->randomElement([0,1]),
            'author_id' => fake()->randomElement(User::where('is_admin' , true)->pluck('id')),
            'category_id' => Category::factory(),
        ];
    }
}
