<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender'];
    public $timestamps = false;

    //relación uno a muchos
    public function teams()
    {
        return $this->hasMany('App\Models\Team');
    }

    protected function name(): Attribute
    {
        return new Attribute(
            get: function ($value) {
                return ucfirst($value);
            },
            // Se guarda en minúsculas, tal y como está declarado el enum (así funciona
            // igual en MySQL, que no distingue mayúsculas, y en SQLite).
            set: function ($value) {
                return strtolower($value);
            },
        );
    }

    protected function gender(): Attribute
    {
        return new Attribute(
            get: function ($value) {
                return strtolower($value);
            },
            set: function ($value) {
                return strtolower($value);
            },
        );
    }
}
