<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\League;
use App\Models\Team;
use App\Models\Referee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Game::class;

    public function definition()
    {
        return [
            'id_leagues' => League::all()->random()->id,
            'id_teams_local' => Team::all()->random()->id,
            'id_teams_visiting' => Team::all()->random()->id,
            'start_time' => fake()->dateTime(),
            'end_time' => fake()->dateTime(),
            'referees_id' => Referee::all()->random()->id,
        ];
    }
}
