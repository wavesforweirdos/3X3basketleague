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
            'name' => 'Treblie',
            'email' => 'treblie@gmail.com',
            'password' => bcrypt('12345')
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
        Entity::factory(1)->create();
        League::factory(1)->create();
        Team::factory(8)->create();
        Game::factory(50)->create();
        Player::factory(100)->create();
    }
}
