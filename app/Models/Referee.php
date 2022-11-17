<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    use HasFactory;
    public $timestamps = false;


    //relación uno a uno inversa
    public function refereeTeam()
    {
        return $this->belongsTo('App\Models\Game');
    }
}
