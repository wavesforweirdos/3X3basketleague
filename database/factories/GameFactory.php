<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\League;
use App\Models\Team;
use App\Models\Referee;
use Illuminate\Database\Eloquent\Factories\Factory;
use DateTime;


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
        $time  = date("Y-m-d H:m:s", mt_rand(strtotime("2000-01-01 10:00:00"), strtotime(date(now())))); //fecha aleatoria entre un intervalo
        return [
            'league_id' => League::all()->random()->id,
            'id_teams_local' => Team::all()->random()->id,
            'id_teams_visiting' => Team::all()->random()->id,
            'score_local' => fake()->numberBetween(0,21),
            'score_visiting' => fake()->numberBetween(0,21),
            'start_time' => $time,
            'duration' => fake()->time('00:0m:s', '10 minutes'),
            'id_referees' => Referee::all()->random()->id,
            'state' => fake()->numberBetween(0,3),
        ];
    }
}
