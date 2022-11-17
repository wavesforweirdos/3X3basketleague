<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;
    public $timestamps = false;

    //relación uno a muchos
    public function leagues()
    {
        return $this->hasMany('App\Models\League');
    }
    
    //relación uno a uno
    public function manager(){
        return $this->hasOne('App\Models\Manager');
    }
}
