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
        // Partidos de las últimas seis semanas
        $time  = date("Y-m-d H:i:s", mt_rand(strtotime("-6 weeks"), time()));
        // Local y visitante nunca son el mismo equipo
        $local = Team::all()->random();
        $visiting = Team::where('id', '!=', $local->id)->get()->random();
        return [
            'league_id' => League::all()->random()->id,
            'id_teams_local' => $local->id,
            'id_teams_visiting' => $visiting->id,
            'score_local' => fake()->numberBetween(0,21),
            'score_visiting' => fake()->numberBetween(0,21),
            'start_time' => $time,
            'duration' => sprintf('00:%02d:%02d', fake()->numberBetween(5, 10), fake()->numberBetween(0, 59)), // mm:ss de un partido 3x3 (H:i:s: antes se usaba la m del mes)
            'id_referees' => Referee::all()->random()->id,
            'state' => fake()->numberBetween(0,3),
        ];
    }
}
