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
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(10),
            'content' => $this->faker->paragraphs(5, true),
            'created_at' => $this->faker->dateTimeBetween('-3 months'),
            'published_date' => $this->faker->dateTimeBetween('-3 months'),
            'status' => $this->faker->randomElement([true, false])
        ];
    }
}
