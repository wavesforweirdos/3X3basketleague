<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeague;
use App\Models\BasketCourt;
use App\Models\Entity;
use App\Models\League;
use App\Models\Manager;
use Dotenv\Parser\Lexer;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class LeagueController extends Controller
{
    public function index()
    {
        $leagues = League::paginate(5);
        return view('league.index', compact('leagues'));
    }

    public function create($entity)
    {
        return view('league.create', compact('entity'));
    }

    public function show(League $league)
    {
        $id_entity = $league->id_entities;
        $entity = Entity::find($id_entity);

        $id_manager = $entity->id_managers;
        $manager = Manager::find($id_manager);

        $id_basketcourt = $league->id_basket_courts;
        $basket_court = BasketCourt::find($id_basketcourt);

        return view('league.show', compact('league', 'entity', 'manager', 'basket_court'));
    }

    public function store(StoreLeague $request)
    {
        $basket_court = BasketCourt::create($request->all());
        $request['id_basketcourts'] = $basket_court->id;

        $league = League::create($request->all());
        return redirect()->route('league.show', compact('league'));
    }

    public function edit(League $league)
    {
        $id_entity = $league->id_entities;
        $entity = Entity::find($id_entity);

        $id_manager = $entity->id_managers;
        $manager = Manager::find($id_manager);

        $id_basketcourt = $league->id_basket_courts;
        $basket_court = BasketCourt::find($id_basketcourt);

        return view('league.edit', compact('league', 'entity', 'manager', 'basket_court'));
    }

    public function update(StoreLeague $request, League $league)
    {
        $id_basketcourt = $league->id_basket_courts;
        $basket_court = BasketCourt::find($id_basketcourt);
        $basket_court->update($request->all());

        $request['id_basket_courts'] = $basket_court->id;
        if ($request->hasFile('image')) {
            $destination_path = 'public/images/leagues';
            $image = $request->file('image');
            $image_name = $request['name'] . '_profile.' . $image->extension();
            $path = $request->file('image')->storeAs($destination_path, strtolower($image_name));
            
            $request['photo'] = $image_name;
        }
        $league->update($request->all());
        return redirect()->route('league.show', $league);
    }

    public function destroy(League $league)
    {
        $id_entity = $league->id_entities;
        $entity = Entity::find($id_entity);

        $league->delete();
        return redirect()->route('entity.show', $entity);
    }
}
