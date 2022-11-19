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
        $this->leagues = League::select("*")->where('id_entities', '=', $this->entity->id)->get();
    }
    public function index()
    {
        $entity = $this->entity;
        $manager = $this->manager;
        $leagues = $this->leagues;

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return view('entity.index', compact('entity', 'manager', 'leagues'));
        } else {
            if (isset($_POST['save'])) {
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
            }
        }
    }
    public function create()
    {
        return view('entity.create');
    }
    public function edit($id_entity)
    {
        $entity = $this->entity;
        $manager = $this->manager;
        return view('entity.edit', compact('entity', 'manager'));
    }
    public function show($league)
    {
        return view('entity.show', compact('league'));
    }
    public function delete()
    {
        return view('entity.delete');
    }
}
