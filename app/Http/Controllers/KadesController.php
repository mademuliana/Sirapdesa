<?php
/**
 * Created by PhpStorm.
 * User: Chevalier
 * Date: 1/17/2017
 * Time: 12:27 AM
 */

namespace App\Http\Controllers;

use App\Riwayat;
use App\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Pemilik;
use App\Tanah;
use App\KeteranganKonflik;
class KadesController extends Controller
{
    /**
     * @return string
     */
    public function index()
    {
        $ket_konfliks = KeteranganKonflik::all();

        $tanah_konfliks = array();
        foreach ($ket_konfliks as $ket_konflik) {
          $tanah_konflik = Tanah::where('id', $ket_konflik->info_tanah_id)->first();
          array_push($tanah_konfliks, $tanah_konflik);
        }

        $pemilik_tanahs = array();
        foreach ($tanah_konfliks as $tanah_konflik) {
          # code...
          $pemilik_tanah = Pemilik::where('id', $tanah_konflik->pemilik_tanah_id)->first();
          array_push($pemilik_tanahs, $pemilik_tanah);
        }

        $konfliks = KeteranganKonflik::where('status_konfirmasi', false)->get();
        $transaksis = Transaksi::where('status_konfirmasi', false)->get();

        return view('kades',[
            'konfliks'=>$konfliks,
            'transaksis'=>$transaksis,
            //'ket_konflik' => $ket_konfliks,
            'tanah_konfliks' => $tanah_konfliks,
            'pemilik_tanahs' => $pemilik_tanahs
            ]);
    }

    public function update(Request $request){
//        dd($request);
        $data = $request->only(['type' ,'status_konfirmasi']);
//        dd($data['type']);
        if ($data['type']=='konflik'){
            if ($data['status_konfirmasi']!=null)
            foreach ($data['status_konfirmasi'] as $key => $status){
                if ($status=='on'){
                    $konflik = KeteranganKonflik::find($key);
                    $konflik->status_konfirmasi = true;
                    $konflik->save();
                }
            }
        } elseif ($data['type']=="transaksi"){
//            dd($data);
            if ($data['status_konfirmasi']!=null)
            foreach ($data['status_konfirmasi'] as $key => $status){
                if ($status=="on"){
                    $this->confirmTransaksi($key);
                    $transaksi = Transaksi::find($key);
                    $transaksi->status_konfirmasi = true;
                    $transaksi->save();
                }
            }
        }
        return $this->index();
    }

    public function confirm(Request $request){
        $data = $request->only(['type','id']);
        switch ($data['type']){
            case 'konflik':
                if(!$this->confirmKonflik($data['id']))
                    return response()->json(['status'=>'errror', 'error'=>'error when confirmation conflict']);
                break;
            case 'transaksi':
                if(!$this->confirmTransaksi($data['id']))
                    return response()->json(['status'=>'errror', 'error'=>'error when confirmation transaction']);
                break;
            default:
                return response()->json(['status'=>'error','message'=>'Type error']);
        }
        return response()->json(['status'=>'success']);
    }

    private function confirmKonflik($id){
        $konflik = KeteranganKonflik::find($id);
        if ($konflik == null)
            return abort(404);
        $konflik->status_konfirmasi=true;
        return $konflik->save();
    }

    private function confirmTransaksi($id){
        $transaksi = Transaksi::find($id);
//        dd($transaksi->tanah->id);
        return $this->splitTanah($transaksi->tanah->id, $transaksi->luas_tanah, $transaksi->pembeli);
    }

    private function splitTanah($idTanah, $ukuran, $newPemilik){
        $oldTanah = Tanah::find($idTanah);
        $newTanah = $oldTanah->replicate();

        $oldUkuran = $oldTanah->luas;
        if ($oldUkuran < $ukuran){

            return false;
        } elseif ($oldUkuran==$ukuran){
            $newTanah->pemilik_tanah_id = $newPemilik->id;
            if (!$newTanah->save()) return false;
            if (!$oldTanah->delete()) return false;

        } else {
            $newTanah->luas = $ukuran;
            $newTanah->pemilik_tanah_id = $newPemilik->id;
            if(!$newTanah->save()) return false;
            $oldTanah->luas = $oldUkuran-$ukuran;
            $oldTanah->save();
//            if(!$oldTanah->delete()) return false;
        }
        $riwayat = new Riwayat();
        $riwayat->nama_riwayat = $oldTanah->pemilik->nama;
        $riwayat->dasar_catatan_riwayat = "Jual Beli";
        $riwayat->info_tanah_id = $newTanah->id;
        $riwayat->tanggal_riwayat = Carbon::now()->toDateTimeString();
        $riwayat->save();
        return true;
    }

}
