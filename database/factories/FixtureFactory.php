<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FixtureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'home' => $this->faker->numberBetween(1, 100) ,
            'away' => $this->faker->numberBetween(1, 100) ,
            'matchPlayed' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
            'score' => $this->faker->numberBetween(0, 8) .':' . $this->faker->numberBetween(0, 9)
        ];
    }
}
