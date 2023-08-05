<?php

namespace Database\Factories;

use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SocialLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = \App\Models\User::all()->pluck('id')->toArray();
        return [
            'user_id' => Arr::random($user),
            'facebook' => fake()->url(),
            'twitter'   => fake()->url(),
            'linkedin' => fake()->url(),
        ];
    }
}
