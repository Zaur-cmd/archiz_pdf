<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioFactory extends Factory
{

    protected $model = Portfolio::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return  [
            'image' => '/img/no-image.png',
            'user_id' => User::whereType(1)->get()->random()->id
        ];
    }
}
