<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
  protected $table = 'riwayat_tanah';
  public function tanah()
  {
    return $this->belongsTo('App\Tanah');
  }
}
