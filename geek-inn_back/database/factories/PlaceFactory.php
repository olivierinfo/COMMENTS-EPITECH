<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text($maxNbChars = 200),
            'adress' => $this->faker->streetAddress(),
            'postal_code' => $this->faker->numberBetween($min = 13001, $max = 13016),
            'city' => "Marseille",
            'phone' =>$this->faker->unique()->e164PhoneNumber, 
            'email' => $this->faker->unique()->safeEmail(),
            'logo'=>$this->faker->imageUrl($width = 640, $height = 480), 
            'cover_picture'=>$this->faker->imageUrl($width = 640, $height = 480), 
            'galery_pictures'=>$this->faker->imageUrl($width = 640, $height = 480), 
            'category_id' =>rand(1,5),
        ];
    }
}