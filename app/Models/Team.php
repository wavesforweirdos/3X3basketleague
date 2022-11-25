<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'id_categories', 'id_leagues', 'id_clubs'];
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

    //relación uno a muchos
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    
}
