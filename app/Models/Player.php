<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
  use HasFactory;
  protected $fillable = ['first_name', 'last_name', 'birthdate', 'photo', 'id_teams'];
  public $timestamps = false;

  //relación uno a muchos inversa
  public function team()
  {
    return $this->belongsTo('App\Models\Team');
  }
}
