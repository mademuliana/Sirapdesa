<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeteranganKonflik extends Model
{
  protected $table = 'keterangan_konflik';

  public function tanah()
  {
    return $this->hasOne('App\Tanah', 'id', 'info_tanah_id');
  }
}