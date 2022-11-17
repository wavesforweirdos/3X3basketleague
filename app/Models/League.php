<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;
    public $timestamps = false;

    //relación uno a muchos inversa
    public function entity()
    {
        return $this->belongsTo('App\Models\Entity');
    }

    //relación uno a muchos
    public function teams()
    {
        return $this->hasMany('App\Models\Team');
    }
    public function games()
    {
        return $this->hasMany('App\Models\Game');
    }

     //relación uno a uno
     public function basketcourt(){
        return $this->hasOne('App\Models\BasketCourt');
    }
}
