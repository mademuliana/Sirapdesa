<?php
/**
 * Created by PhpStorm.
 * User: Chevalier
 * Date: 1/14/2017
 * Time: 11:43 PM
 */

namespace App\Http\Controllers;
use App\KeteranganTanah;
use App\Pemetakan;
use App\Pemilik;
use App\Riwayat;
use App\Tanah;

class TambahController extends Controller
{
    public function index(){
        //
    }

    public function pemilik(){
        $tanah = $pemetakan = $pemilik = null;
        $data='pemilik';

        return view('tambah_data',['data'=>$data,'tanah' => $tanah, 'pemetakan' => $pemetakan, 'pemilik' => $pemilik]);

    }

    public function tanah($id){
        $tanah = $pemetakan = $pemilik = null;
        $data='tanah';

        return view('tambah_data',['data'=>$data,'tanah' => $tanah, 'pemetakan' => $pemetakan, 'pemilik' => $pemilik, 'id'=>$id]);
    }

    public function riwayat($id){
        $tanah = $pemetakan = $pemilik = null;
        $data='riwayat';

        return view('tambah_data',['data'=>$data,'tanah' => $tanah, 'pemetakan' => $pemetakan, 'pemilik' => $pemilik, 'id'=>$id]);
    }
}