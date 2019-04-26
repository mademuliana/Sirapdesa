<?php
/**
 * Created by PhpStorm.
 * User: Chevalier
 * Date: 1/16/2017
 * Time: 4:03 AM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'pemberitahuan_transaksi';

    public function penjual(){
        return $this->hasOne('App\Pemilik','id','penjual_tanah_id');
    }

    public function pembeli(){
        return $this->hasOne('App\Pemilik', 'id', 'pembeli_tanah_id');
    }

    public function tanah(){
        return $this->hasOne('App\Tanah', 'id', 'info_tanah_id');
    }
}