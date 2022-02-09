<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class employesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'FirstName' => $this->faker->lastName(),
            'LastName' => $this->faker->lastName(),
            'Email' => $this->faker->freeEmail(),
            'Company_id' => $this->faker->randomElement([1, 2,3]),//las primeras tres compañias
            'Phone' => $this->faker->tollFreePhoneNumber()
        ];
    }
}
