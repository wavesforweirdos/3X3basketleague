<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntity;
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

    public function store(StoreEntity $request)
    {
        $manager = Manager::create($request->all());
        $request['id_managers'] = $manager->id;
        if ($request->hasFile('image')) {
            $destination_path = 'public/images/entities';
            $image = $request->file('image');
            $image_name = $request['entity_name'] . '_profile.' . $image->extension();
            $path = $request->file('image')->storeAs($destination_path, strtolower($image_name));
            
            $request['photo'] = $image_name;
        }
        $entity = Entity::create($request->all());
        $leagues =  League::select("*")->where('id_entities', '=', $entity->id)->get()->sortByDesc('id');

        return redirect()->route('entity', compact('entity', 'manager', 'leagues'));
    }

    public function edit($entity)
    {
        $id_manager = $this->entity->id_managers;
        $manager = Manager::find($id_manager);
        return view('entity.edit', compact('entity', 'manager'));
    }

    public function update(StoreEntity $request, Entity $entity)
    {
        $id_manager = $this->entity->id_managers;
        $manager = Manager::find($id_manager);

        $manager->update($request->all());
        $request['id_managers'] = $manager->id;
        if ($request->hasFile('image')) {
            $destination_path = 'public/images/entities';
            $image = $request->file('image');
            $image_name = $request['entity_name'] . '_profile.' . $image->extension();
            $path = $request->file('image')->storeAs($destination_path, strtolower($image_name));

            $request['photo'] = $image_name;
        }
        $entity->update($request->all());
        $leagues =  League::select("*")->where('id_entities', '=', $entity->id)->get()->sortByDesc('id');

        return redirect()->route('entity', compact('entity', 'manager', 'leagues'));
    }

    public function destroy(Entity $entity)
    {
        $entity->delete();
        return redirect()->route('entity');
    }
}
