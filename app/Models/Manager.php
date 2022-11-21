<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'phone', 'state'];
    public $timestamps = false;

    //relación uno a uno inversa
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
