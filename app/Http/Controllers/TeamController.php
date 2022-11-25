<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::paginate(5);
        return view('team.index', compact('teams'));
    }

    public function create($league)
    {
        $league = League::find($league);
        return view('team.create', compact('league'));
    }

    public function store(StoreTeam $request, $league)
    {
        $team = Team::create($request->all());
        return redirect()->route('league.show', compact('league'));
    }

    public function edit(Team $team)
    {
    }

    public function update(StoreTeam $request, Team $team)
    {
    }

    public function destroy(Team $team)
    {
    }
}
