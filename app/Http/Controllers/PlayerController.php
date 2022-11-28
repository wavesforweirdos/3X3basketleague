<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{

    public function destroy(Player $player)
    {
        $team = Team::find($player->team_id);
        $league = League::find($team->league_id);
        $league = $league->id;
        $player->delete();
        
        return redirect()->route('league.show', $league);
    }
}
