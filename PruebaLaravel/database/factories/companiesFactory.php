<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class companiesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'Name' =>$this->faker->catchPhrase(),
           'Email' =>$this->faker->companyEmail(),
           'Logo' =>$this->faker->imageUrl($width = 100, $height = 100)
        ];
    }
}
