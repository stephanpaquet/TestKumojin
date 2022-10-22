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
            'dateBegin' => $this->faker
                ->dateTimeBetween('-1 week', '+1 week'),
            'dateEnd' => $this->faker
                ->dateTimeBetween('+1 week', '+5 week')
        ];
    }
}
