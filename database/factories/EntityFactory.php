<?php

namespace Database\Factories;

use App\Models\Entity;
use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


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
        $name = fake()->word(2);
        return [
            'entity_name' => $name,
            // 'slug' => Str::slug($name, '-'),
            'foundation_year' => fake()->year(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'web' => 'www.' . $name . '.com',
            'country' => fake()->country(),
            'city' => fake()->city(),
            'id_managers' => Manager::all()->random()->id,
            'photo' => fake()->imageUrl(200, 200, $name),
        ];
    }
}
