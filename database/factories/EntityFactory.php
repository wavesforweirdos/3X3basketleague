<?php

namespace Database\Factories;

use App\Models\Entity;
use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\Storage;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entity>
 */
class EntityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Entity::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
            'foundation_year' => fake()->year(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'web' => fake()->url(),
            'country' => fake()->country(),
            'city' => fake()->city(),
            'id_managers' => Manager::all()->random()->id,
            'photo' =>fake()->imageUrl($width=400, $height=400),
            // 'photo' =>fake()->image('public/storage/entity-profile', 400, 400, null, false)
        ];
    }
}