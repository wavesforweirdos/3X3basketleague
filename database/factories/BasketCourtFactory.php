<?php

namespace Database\Factories;

use App\Models\BasketCourt;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BasketCourt>
 */
class BasketCourtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   

    protected $model = BasketCourt::class;
    public function definition()
    {
        return [
            'street' => fake()->streetName(),
            'number' => fake()->numberBetween(0,999),
            'zip_code' => fake()->numberBetween(0,99999),
            'city' => fake()->city(),
        ];
    }
}
