<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = ['id_leagues', 'id_teams_local', 'id_teams_visiting', 'score_loca', 'score_visiting', 'start_time', 'end_time', 'referees_id'];
    public $timestamps = false;

    //relación uno a muchos inversa
    public function league()
    {
        return $this->belongsTo('App\Models\League');
    }

    //relación uno a uno
    public function refereeTeam()
    {
        return $this->hasOne('App\Models\Referee');
    }
}
