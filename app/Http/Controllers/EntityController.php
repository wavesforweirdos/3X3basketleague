<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntity;
use App\Models\Entity;
use App\Models\Manager;
use App\Models\League;
use Illuminate\Http\Request;

class EntityController extends Controller
{

    public function index()
    {
        $entities = Entity::paginate(4);
        return view('welcome', compact('entities'));
    }

    public function create()
    {
        return view('entity.create');
    }

    public function show(Entity $entity)
    {
        $id_manager = $entity->id_managers;
        $manager = Manager::find($id_manager);
        $leagues = League::select("*")->where('id_entities', '=', $entity->id)->get()->sortByDesc('start_day');

        return view('entity.show', compact('entity', 'manager', 'leagues'));
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
        return redirect()->route('entity.show', $entity);
    }

    public function edit(Entity $entity)
    {
        $id_manager = $entity->id_managers;
        $manager = Manager::find($id_manager);
        return view('entity.edit', compact('entity', 'manager'));
    }

    public function update(StoreEntity $request, Entity $entity)
    {
        $id_manager = $entity->id_managers;
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

        return redirect()->route('entity.show', $entity);
    }

    public function destroy(Entity $entity)
    {
        $entity->delete();
        return redirect()->route('entity.index');
    }
}
