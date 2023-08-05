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
            'content' => fake()->paragraph(5),
            'thumbnail' => fake()->image(),
            'author_id' => User::select('id')->inRandomOrder()->take(1)->pluck('id')[0],
            'category_id' => Category::factory(),
            'slug' => fake()->slug()
        ];
    }
}
