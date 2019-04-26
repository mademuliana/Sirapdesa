<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
  protected $table = 'pemilik_tanah';
  // public $incrementing = false;

  public function tanah(){
    return $this->hasMany('App\Tanah');
  }
}
