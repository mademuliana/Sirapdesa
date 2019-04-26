<?php
/**
 * Created by PhpStorm.
 * User: Chevalier
 * Date: 1/15/2017
 * Time: 3:25 AM
 */

namespace App\Http\Controllers;
use App\KeteranganTanah;
use App\Pemetakan;
use App\Pemilik;
use App\Riwayat;
use App\Tanah;

class EditController extends Controller
{
    public function index(){
        //
    }

    public function pemilik($id){
        $data='pemilik';
        $pemilik = Pemilik::find($id);
        return view('edit_data', ['pemilik' => $pemilik, 'data'=> $data, 'id'=>$id]);
    }

    public function tanah($id){
        $data='tanah';
        $tanah = Tanah::find($id);
        $pemilik = Pemilik::find($tanah->pemilik_tanah_id);
        $pemetakan = Pemetakan::where('info_tanah_id', $id)->first();
        if(!$pemetakan)
            $pemetakan = 'Tidak Ada Data';
        if(!$tanah)
            abort(404);
        return view('edit_data', ['tanah' => $tanah, 'pemetakan' => $pemetakan, 'pemilik' => $pemilik, 'data'=> $data, 'id'=>$id]);
    }

    public function batas($id){
        $data='batas';
        $tanah = Tanah::find($id);
        $pemetakan = Pemetakan::where('info_tanah_id', $id)->first();
        if(!$pemetakan)
            $pemetakan = 'Tidak Ada Data';
        if(!$tanah)
            abort(404);
        return view('edit_data', ['tanah' => $tanah, 'pemetakan' => $pemetakan,'data'=> $data, 'id'=>$id]);
    }

}