<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\BasketCourt;
use App\Models\Entity;
use App\Models\Referee;
use App\Models\Game;
use App\Models\League;
use App\Models\Manager;
use App\Models\Player;
use App\Models\Team;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Demo',
            'email' => 'demo@example.com',
            'password' => bcrypt('password')
        ]);

        User::factory(1)->create();

        //------All categories----/
        \App\Models\Category::factory()->create([
            'name' => 'senior',
            'gender' => 'femenino',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'senior',
            'gender' => 'masculino',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'senior',
            'gender' => 'mixto',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'junior',
            'gender' => 'femenino',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'junior',
            'gender' => 'masculino',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'junior',
            'gender' => 'mixto',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'infantil',
            'gender' => 'femenino',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'infantil',
            'gender' => 'masculino',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'infantil',
            'gender' => 'mixto',
        ]);

        Referee::factory(6)->create();
        Manager::factory(3)->create();
        BasketCourt::factory(10)->create();
        // Una entidad y una liga de demostración con datos coherentes (el resto, de factories).
        Entity::factory()->create([
            'entity_name' => 'Club Bàsquet Gràcia',
            'foundation_year' => 1998,
            'web' => 'www.example.com',
            'country' => 'España',
            'city' => 'Barcelona',
            'photo' => null,
        ]);
        League::factory()->create([
            'name' => 'Barcelona Open',
            'logo' => null,
            'min_age' => 12,
            'max_players' => 5,
            'team_gender' => 'f,m,x',
            // Liga en marcha: empezó hace seis semanas y termina dentro de cuatro
            'registration_day' => date('Y-m-d', strtotime('-8 weeks')),
            'start_day' => date('Y-m-d', strtotime('-6 weeks')),
            'end_day' => date('Y-m-d', strtotime('+4 weeks')),
        ]);
        Team::factory(8)->create();
        Game::factory(50)->create();
        // Plantillas equilibradas: 4 o 5 jugadores por equipo (la liga permite 5)
        foreach (Team::all() as $team) {
            Player::factory(fake()->numberBetween(4, 5))->create(['team_id' => $team->id]);
        }
    }
}
