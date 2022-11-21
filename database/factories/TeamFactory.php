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
            'name' => fake()->name(),
            'id_categories' => Category::all()->random()->id,
            'id_leagues' => League::all()->random()->id,
        ];
    }
}
