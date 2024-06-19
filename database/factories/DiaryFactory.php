<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use DateTime;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diary>
 */
class DiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => fake()->date($format = 'Y-m-d', $max = 'now'),
            'page' => fake()->randomDigitNotNull,
            'body' => fake()->word,
            'book_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
    }
}
