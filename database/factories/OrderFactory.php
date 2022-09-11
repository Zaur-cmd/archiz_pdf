<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return  [
            'client_id'     => User::whereType(1)->get()->random()->id,
            'user_id'       => User::whereType(0)->get()->random()->id,
            'duration'      => rand(1, 100),
            'total'         => rand(50, 500),
            'date_time'     => $this->faker->dateTime()
        ];
    }
}
