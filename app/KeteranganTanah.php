<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeteranganTanah extends Model
{
  protected $table = 'keterangan_tanah';
  public function tanah()
  {
    return $this->belongsTo('App\Tanah');
  }
}
