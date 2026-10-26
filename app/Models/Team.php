<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'league_id'];
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

    protected function name(): Attribute
    {
        return new Attribute(
            get: function ($value) {
                return ucwords($value);
            },
            set: function ($value) {
                return strtolower($value);
            },
        );
    }
    
}
