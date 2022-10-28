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
    public function definition(): array
    {
        return [
            'name' => implode(' ', $this->faker->words(2)),
            'description' => $this->faker->paragraph,
            'timezone' => $this->faker->numberBetween(-11, 12),
            'dateBegin' => $this->faker->dateTimeBetween('-1 week', '+1 week')->format('Y-m-d H:i:s'),
            'dateEnd' => $this->faker->dateTimeBetween('+1 week', '+5 week')->format('Y-m-d H:i:s')
        ];
    }
}
