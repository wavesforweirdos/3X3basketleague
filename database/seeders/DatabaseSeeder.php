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

        User::factory(9)->create();

        //------All categories----/
        \App\Models\Category::factory()->create([
            'name' => 'senior',
            'gender' => 'f',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'senior',
            'gender' => 'm',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'senior',
            'gender' => 'mix',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'junior',
            'gender' => 'f',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'junior',
            'gender' => 'm',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'junior',
            'gender' => 'mix',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'infantil',
            'gender' => 'f',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'infantil',
            'gender' => 'm',
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'infantil',
            'gender' => 'mix',
        ]);

        Referee::factory(6)->create();
        Manager::factory(10)->create();
        BasketCourt::factory(2)->create();
        Entity::factory(2)->create();
        League::factory(3)->create();
        Team::factory(24)->create();
        Game::factory(12)->create();
        Player::factory(100)->create();
    }
}
