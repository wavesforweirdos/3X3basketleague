<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    public $timestamps = false;

    //relación uno a muchos inversa
    public function league()
    {
        return $this->belongsTo('App\Models\League');
    }

    //relación uno a muchos
    public function players()
    {
        return $this->hasMany('App\Models\Player');
    }

    //relación uno a uno
    public function category()
    {
        return $this->hasOne('App\Models\Category');
    }
    
    public function club()
    {
        return $this->hasOne('App\Models\Club');
    }
}
