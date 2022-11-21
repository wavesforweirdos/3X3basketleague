<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    protected $leagues;

    public function __construct($id_entity)
    {
        $this->leagues = League::select("*")->find('id_entities', '=', $this->entity->id)->get();
    }

    public function index()
    {
    }

    public function create()
    {
        return view('league.create');
    }

    public function delete()
    {
    }

    public function show()
    {
    }
}
