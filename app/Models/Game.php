<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Game extends Model
{
    use HasFactory;
    protected $fillable = ['league_id', 'id_teams_local', 'id_teams_visiting', 'start_time', 'id_referees', 'state'];
    public $timestamps = false;

    //relación uno a muchos inversa
    public function league()
    {
        return $this->belongsTo('App\Models\League');
    }

    public function referee()
    {
        return $this->belongsTo('App\Models\Referee');
    }

    // protected function startTime(): Attribute
    // {
    //     return new Attribute(
    //          get: fn($value) => date_format(new DateTime($value), 'd M, Y | H:i'),
    //         // get: fn ($value) => date_format(new DateTime($value), 'Y-m-d  H:i'),
    //     );
    // }
    protected function duration(): Attribute
    {
        return new Attribute(

            get: fn ($value) => date_format(new DateTime($value), "i' s''"),
        );
    }

    protected function idTeamsLocal(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Team::find($value),
        );
    }
    protected function idTeamsVisiting(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Team::find($value),
        );
    }
   
}
