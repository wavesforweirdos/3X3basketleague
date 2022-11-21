<?php

namespace Database\Factories;

use App\Models\BasketCourt;
use App\Models\Entity;
use App\Models\League;
use DateTime;
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
        $date = date("Y-m-d", mt_rand(strtotime("2000-01-01"), strtotime(date(now())))); //fecha aleatoria entre un intervalo
        return [
            'name' => fake()->name(),
            'logo' => fake()->imageUrl($width = 100, $height = 50),
            'min_age' => fake()->numberBetween(0, 100),
            'max_players' => fake()->numberBetween(3, 10),
            'team_gender' => implode(",", fake()->randomElements(['f', 'm', 'x'], 3)),
            'start_day' => $date,
            'end_day' => date_add(new DateTime($date), date_interval_create_from_date_string("3 days")), //fecha aleatoria +3dias
            'registration_day' => date_sub(new DateTime($date), date_interval_create_from_date_string("14 days")), //fecha aleatoria +3dias
            'id_basket_courts' => BasketCourt::all()->random()->id,
            'id_entities' => Entity::all()->random()->id,
        ];
    }
}
