<?php

namespace App\Http\Controllers;

use App\Pemilik;
use App\Tanah;
use App\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Tanah $id){
        $tanah_transaksi = $id;
//        $pemilik_tanah = Pemilik::where('id', $tanah_transaksi->pemilik_tanah_id)->first();
        $pemilik_tanah = $tanah_transaksi->pemilik;

        $pemiliks = Pemilik::all();
        $tanahs = Tanah::all();
        $tanahs = array();
        foreach ($pemiliks as $pemilik){
            $tanah = Tanah::where('pemilik_tanah_id', $pemilik->id)->get();
            array_push($tanahs, $tanah);
        }


        if(!$tanah) abort(404);

        return view('transaksi_tanah',['tanahs'=>$tanahs,'pemiliks'=>$pemiliks, 'id'=>$id, 'tanah_transaksi'=>$tanah_transaksi, 'pemilik_tanah'=>$pemilik_tanah]);
    }

    public function store(Request $request, $id){
        $pemilik_tanah_id = Tanah::find($id)->pemilik_tanah_id;
        $transaksi = new Transaksi;
        $transaksi->luas_tanah = $request->luas_tanah;
        $transaksi->pembeli_tanah_id = $request->pembeli_tanah_id;
        $transaksi->keterangan = $request->keterangan;
        $transaksi->penjual_tanah_id = $pemilik_tanah_id;
        $transaksi->info_tanah_id = $id;
        $transaksi->status_konfirmasi = false;
        $transaksi->save();
//        return redirect('/tanah/'.$id);
        return redirect('list');
    }



    private function splitTanah(Tanah $tanah, $ukuran){

    }
}
