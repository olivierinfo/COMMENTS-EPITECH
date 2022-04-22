<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
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
            'galery_pictures'=>$this->faker->imageUrl($width = 640, $height = 480),  
            'place_id' =>rand(1,100),
            'price' => $this->faker->numberBetween($min = 0, $max = 100),
            'date' => $this->faker->date($format = 'Y-m-d', $min = 'now'),           
            
        ];
    }
}