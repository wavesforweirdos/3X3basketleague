<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender'];

    public $timestamps = false;

    //relación uno a uno inversa
    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
