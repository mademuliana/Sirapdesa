<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tanah extends Model
{
    use SoftDeletes;
    protected $table = 'info_tanah';

    public function pemilik()
    {
    return $this->hasOne('App\Pemilik', 'id', 'pemilik_tanah_id');
    }
    public function riwayat()
    {
    return $this->hasMany('App\Riwayat');
    }
    public function maps()
    {
      return $this->hasMany('App\Maps');
    }
    public function pemetakan()
    {
    return $this->hasMany('App\Pemetakan');
    }
    public function keteranganKonflik()
    {
    return $this->hasMany('App\KeteranganKonflik');
    }
    public function keteranganTanah()
    {
    return $this->hasMany('App\KeteranganTanah');
    }
}
