<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\League;
use App\Models\Category;
use App\Models\Entity;
use App\Http\Requests\StoreGame;
use App\Models\Referee;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::paginate(5);
        return view('game.index', compact('games'));
    }

    public function create($league)
    {
        $league = League::find($league);
        return view('game.create', compact('league'));
    }

    public function store($request)
    {
        return $request;
        $game = Game::create($request->all());
        $league = League::find($game->league_id);

        return redirect()->route('league.show', $league);
    }

    public function edit(Game $game)
    {
        $league = League::find($game->league_id);
        $players = $game->players;
        $category = Category::find($game->category_id);
        $referees = Referee::all();
        $referee = Referee::find($game->id_referees);
        return view('game.edit', compact('league', 'game', 'players', 'category', 'referees', 'referee'));
    }

    public function update(StoreGame $request, Game $game)
    {
        $date = date("Y:m:d H:i:s", strtotime($request->start_time));
        $request['start_time'] = $date;

        $game->update($request->all());
        return redirect()->route('league.show', $game->league);
    }

    public function destroy(Game $game)
    {
        $league = League::find($game->league_id);
        $league = $league->id;
        $game->delete();
        return redirect()->route('league.show', $league);
    }
}
