<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'FC ' . $this->faker->word ,
            'address' => $this->faker->streetAddress,
            'years' => $this->faker->numberBetween(12, 107),
            'email' => $this->faker->companyEmail,
            'phone' => $this->faker->phoneNumber,
            'country' => $this->faker->country
        ];
    }
}
