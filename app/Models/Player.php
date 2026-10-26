<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Player extends Model
{
  use HasFactory;
  protected $fillable = ['first_name', 'last_name', 'birthdate', 'email', 'team_id'];
  public $timestamps = false;

  //relación uno a muchos inversa
  public function team()
  {
    return $this->belongsTo('App\Models\Team');
  }

  protected function firstName(): Attribute
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
  
  protected function lastName(): Attribute
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
