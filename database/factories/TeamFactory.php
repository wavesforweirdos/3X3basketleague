<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\Category;
use App\Models\League;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $mdoel = Team::class;

    public function definition()
    {
        return [
            'name' => fake()->unique()->words(1, true),
            // 'category_id' => Category::all()->random()->id,
            'category_id' => fake()->numberBetween(1,2),
            'league_id' => League::all()->random()->id,
        ];
    }
}
