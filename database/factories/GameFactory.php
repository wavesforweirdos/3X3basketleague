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
            'id_leagues' => League::all()->random()->id,
            'id_teams_local' => Team::all()->random()->id,
            'id_teams_visiting' => Team::all()->random()->id,
            'score_local' => fake()->numberBetween(0,200),
            'score_visiting' => fake()->numberBetween(0,200),
            'start_time' => $time,
            'end_time' => date_add(new DateTime($time), date_interval_create_from_date_string("2 hours")),
            'referees_id' => Referee::all()->random()->id,
        ];
    }
}
