<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Category;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTeam;


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

    public function store(StoreTeam $request)
    {
        $team = Team::create($request->all());
        $league = League::find($team->league_id);

        return redirect()->route('league.show', $league);
    }

    public function edit(Team $team)
    {
        $league = League::find($team->league_id);
        $players = $team->players;
        $category = Category::find($team->category_id);
        return view('team.edit', compact('league', 'team', 'players', 'category'));
    }

    public function update(StoreTeam $request, Team $team)
    {
        $team->update($request->all());
        foreach ($request->players as $requestPlayer) {
            if (array_key_exists('id', $requestPlayer)) {
                $player = Player::find($requestPlayer['id']);
                $player->update($requestPlayer);
            } else {
                if (!$requestPlayer['first_name']) {
                    break;
                }
                $requestPlayer['team_id'] = $team->id;
                $player = Player::create($requestPlayer);
            }
        }
        $league = League::find($team->league_id);
        $league = $league->id;
        return redirect()->route('league.show', $league);
    }

    public function destroy(Team $team)
    {
        $league = League::find($team->league_id);
        $league = $league->id;
        $team->delete();
        return redirect()->route('league.show', $league);
    }
}
