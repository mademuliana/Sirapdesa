<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemetakan extends Model
{
  protected $table = 'pemetakan_tanah';
  public function tanah()
  {
    return $this->belongsTo('App\Tanah');
  }
}
