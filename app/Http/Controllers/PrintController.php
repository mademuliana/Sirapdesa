<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanah;
use App\Pemetakan;
use App\Riwayat;
use App\Pemilik;

class PrintController extends Controller
{
  public function penguasaan_fisik($id)
  {
    $tanah = Tanah::find($id);
    // if($tanah->validasi && $tanah->status_konflik==false){
      $pemilik = Pemilik::where('id', $tanah->pemilik_tanah_id)->first();
      // dd($pemilik);
      $pemetakan = Pemetakan::where('info_tanah_id', $id)->first();
      $riwayats = Riwayat::where('info_tanah_id', $id)->get();
      $riwayat = $riwayats->last();
      if(!$tanah)
        abort(404);
      return view('/berkas/penguasaan_fisik', ['tanah' => $tanah, 'pemetakan' => $pemetakan, 'riwayat' => $riwayat, 'pemilik' => $pemilik]);
    // }
    // else {
    //   return redirect('/tanah/'.$id)->with('status', 'Data Anda Belum Di Validasi');
    // }

  }
}
