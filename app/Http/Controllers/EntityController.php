<?php

namespace App\Http\Controllers;

use App\Models\BasketCourt;
use App\Models\Entity;
use App\Models\Manager;
use App\Models\League;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    protected $entity;
    protected $manager;
    protected $leagues;

    public function __construct()
    {
        $this->entity = Entity::all()->random();
        $id_manager = $this->entity->id_managers;
        $this->manager = Manager::find($id_manager);
        $this->leagues = League::select("*")->where('id_entities', '=', $this->entity->id)->get()->sortByDesc('id');
    }

    public function index()
    {
        $entity = $this->entity;
        $manager = $this->manager;
        $leagues = $this->leagues;

        return view('entity.index', compact('entity', 'manager', 'leagues'));
    }

    public function create()
    {
        return view('entity.create');
    }

    public function store(Request $request)
    {

        $manager = new Manager();

        $manager->first_name = $request->first_name;
        $manager->last_name = $request->last_name;
        $manager->phone = $request->phone;
        $manager->state = $request->state;
        $manager->save();

        $entity = new Entity();

        $entity->name = $request->entity_name;
        $entity->foundation_year = $request->foundation_year;
        $entity->phone = $request->entity_phone;
        $entity->email = $request->email;
        $entity->web = $request->web;
        $entity->country = $request->country;
        $entity->city = $request->city;
        $entity->id_managers = $manager->id;

        if ($request->hasFile('image')) {
            $destination_path = 'public/images/entities';
            $image = $request->file('image');
            $image_name = $entity->name . '_profile.' . $image->extension();
            $path = $request->file('image')->storeAs($destination_path, $image_name,);

            $entity->photo = $image_name;
        }
        $entity->save();

        $leagues =  League::select("*")->where('id_entities', '=', $entity->id)->get()->sortByDesc('id');

        return redirect()->route('entity', compact('entity', 'manager', 'leagues'));
    }

    public function edit()
    {
        $entity = $this->entity;
        $manager = $this->manager;
        return view('entity.edit', compact('entity', 'manager'));
    }

    public function update(Request $request)
    {
        $entity = $this->entity;
        $manager = $this->manager;

        $manager->first_name = $request->first_name;
        $manager->last_name = $request->last_name;
        $manager->phone = $request->phone;
        $manager->state = $request->state;
        $manager->save();

        $entity->name = $request->entity_name;
        $entity->foundation_year = $request->foundation_year;
        $entity->phone = $request->entity_phone;
        $entity->email = $request->email;
        $entity->web = $request->web;
        $entity->country = $request->country;
        $entity->city = $request->city;
        $entity->id_managers = $manager->id;

        $entity->save();

        $leagues =  League::select("*")->where('id_entities', '=', $entity->id)->get()->sortByDesc('id');


        return redirect()->route('entity', compact('entity', 'manager', 'leagues'));
    }
}
