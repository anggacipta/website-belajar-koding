<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category' => $this->faker->word,
            'type' => $this->faker->randomElement(['boolean', 'multiple']),
            'difficulty' => $this->faker->randomElement(['easy', 'medium', 'hard']),
            'pelajaran' => $this->faker->randomElement(['PHP', 'JavaScript', 'Python']),
            'question' => $this->faker->sentence,
            'correct_answer' => $this->faker->word,
        ];
    }
}
