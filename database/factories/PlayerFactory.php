<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Player::class;

    public function definition()
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'birthdate' => fake()->date(),
            'photo' => fake()->imageUrl($width = 250, $height = 250, 'player'),
            'email' => fake()->unique()->safeEmail(),
            'team_id' => Team::all()->random()->id,
        ];
    }
}
