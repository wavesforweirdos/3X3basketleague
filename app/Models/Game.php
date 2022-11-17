<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
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
