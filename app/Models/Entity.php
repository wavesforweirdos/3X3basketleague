<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Entity extends Model
{
    use HasFactory;
    protected $fillable = ['entity_name', 'foundation_year', 'phone', 'email', 'web', 'country', 'city', 'id_managers', 'photo'];
    public $timestamps = false;

    //relación uno a muchos
    public function leagues()
    {
        return $this->hasMany('App\Models\League');
    }

    //relación uno a uno
    public function manager()
    {
        return $this->hasOne('App\Models\Manager');
    }

    protected function entityName(): Attribute
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
