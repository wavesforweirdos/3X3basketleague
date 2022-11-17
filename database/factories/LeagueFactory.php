<?php

namespace Database\Factories;

use App\Models\BasketCourt;
use App\Models\Entity;
use App\Models\League;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\League>
 */
class LeagueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = League::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
            'min_age' => fake()->numberBetween(0,100),
            'max_players' => fake()->numberBetween(3,10),
            'team_gender' => implode(",", fake()->randomElements(['f', 'm', 'mix'],3)),
            'id_basket_courts' => BasketCourt::all()->random()->id,
            'id_entities' => Entity::all()->random()->id,
        ];
    }
}