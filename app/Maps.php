<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maps extends Model
{
  protected $table = 'lat_lon';
  public function tanah()
  {
    return $this->belongsTo('App\Tanah');
  }
}
