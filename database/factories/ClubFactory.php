<?php

namespace Database\Factories;

use App\Models\Club;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class ClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Club::class;

    public function definition()
    {
        return [
            'name' => fake()->unique()->name(),
        ];
    }
}
