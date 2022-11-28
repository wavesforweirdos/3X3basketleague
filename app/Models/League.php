<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class League extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'min_age', 'max_players', 'team_gender', 'start_day', 'registration_day', 'end_day', 'id_basket_courts', 'id_entities'];

    public $timestamps = false;

    // public function getRouteKey() //sobrescribe la existente para escribir las rutas a partir de 'slug'
    // {
    //     return 'slug';
    // }

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
    public function basketcourt()
    {
        return $this->hasOne('App\Models\BasketCourt');
    }

    public function setGenderAttribute($value)
    {
        $this->attributes['team_gender'] = implode(', ', $value);
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
