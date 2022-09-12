<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'birth_place' => $this->faker->city(),
            'birth_date' => $this->faker->dateTime(),
            'phone_number' => $this->faker->phoneNumber()
        ];
    }
}
