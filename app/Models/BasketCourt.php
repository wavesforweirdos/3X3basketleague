<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasketCourt extends Model
{
  use HasFactory; 
  protected $fillable = ['street', 'number', 'zip_code', 'city',];
  public $timestamps = false;

  //relación uno a uno inversa
  public function basketcourt()
  {
    return $this->belongsTo('App\Models\League');
  }
}
