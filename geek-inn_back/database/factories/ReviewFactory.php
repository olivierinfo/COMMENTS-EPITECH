<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText($maxNbChars = 30, $indexSize = 2),
            'content' => $this->faker->text($maxNbChars = 140),
            'rate' => rand(1,5), 
            'user_id' =>rand(1,100),
            'place_id' =>rand(1,100),
        ];
    }
}