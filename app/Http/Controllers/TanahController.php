<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tanah;
use App\Pemetakan;
use App\Riwayat;
use App\Maps;
use App\KeteranganTanah;
use App\KeteranganKonflik;
use App\Log;
use Illuminate\Support\Facades\Auth;

class TanahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( $id, Request $request)
    {
        $tanah = new Tanah;
        $tanah->persil = $request->nomor_persil_tanah;
        $tanah->luas = $request->luas_tanah;
        $tanah->kelas_desa = $request->kelas_desa_tanah;
        $tanah->ipeda = $request->nomor_ipeda_tanah;
        $tanah->ipeda_r = $request->nomor_ipeda_r_tanah;
        $tanah->ipeda_s = $request->nomor_ipeda_s_tanah;
        $tanah->kondisi = $request->tipe_tanah;
        $tanah->penggunaan_tanah = serialize($request->penggunaan_tanah);
        $tanah->nib = $request->nomor_identifikasi_tanah;
        $tanah->jalan = $request->jalan_tanah;
        $tanah->blok = $request->blok_tanah;
        $tanah->rt = $request->rt_tanah;
        $tanah->rw = $request->rw_tanah;
        $tanah->kampung = $request->kampung_tanah;
        $tanah->desa = $request->desa_tanah;
        $tanah->kelurahan = $request->kelurahan_tanah;
        $tanah->kecamatan = $request->kecamatan_tanah;
        $tanah->kabupaten = $request->kabupaten_tanah;
        $tanah->provinsi = $request->provinsi_tanah;
        $tanah->pemilik_tanah_id = $id;
        $tanah->status_sertifikasi = $request->status_sertifikasi;
        $tanah->save();

        $data_tanah = array('nomor persil tanah' => $request->nomor_persil_tanah,
                        'luas tanah' => $request->luas_tanah,
                        'kelas desa tanah' => $request->kelas_desa_tanah,
                        'nomor ipeda tanah' => $request->nomor_ipeda_tanah,
                        'nomor ipeda r tanah' => $request->nomor_ipeda_r_tanah,
                        'nomor ipeda s tanah' => $request->nomor_ipeda_s_tanah,
                        'tipe tanah' => $request->tipe_tanah,
                        'status sertifikasi' => $request->status_sertifikasi,
                        'penggunaan tanah' => $request->penggunaan_tanah,
                        'nomor identifikasi tanah' => $request->nomor_identifikasi_tanah,
                        'jalan tanah' => $request->jalan_tanah,
                        'blok tanah' => $request->blok_tanah,
                        'rt tanah' => $request->rt_tanah,
                        'rw tanah' => $request->rw_tanah,
                        'kampung tanah' => $request->kampung_tanah,
                        'desa tanah' => $request->desa_tanah,
                        'kelurahan tanah' => $request->kelurahan_tanah,
                        'kecamatan tanah' => $request->kecamatan_tanah,
                        'kabupaten tanah' => $request->kabupaten_tanah,
                        'provinsi tanah' => $request->provinsi_tanah,
                        'nomor identitas pemilik' => $id
                    );
        $log = new Log;
        $log->log = serialize($data_tanah);
        $log->keterangan = 'Input Data Detail Tanah';
        $log->users_no_ktp = Auth::user()->no_ktp;
        $log->save();

        $tu = $request->tetangga_utara_batas;
        $tt = $request->tetangga_timur_batas;
        $ts = $request->tetangga_selatan_batas;
        $tb = $request->tetangga_barat_batas;
        $bu = $request->bidang_utara_batas;
        $bt = $request->bidang_timur_batas;
        $bs = $request->bidang_selatan_batas;
        $bb = $request->bidang_barat_batas;
        if($tu != "" || $tt != "" || $ts != "" || $tb != "" || $bu != "" || $bt != "" || $bs != "" || $bb != ""){
            $pemetakan = new Pemetakan;
            $pemetakan->tetangga_utara = $tu;
            $pemetakan->tetangga_timur = $tt;
            $pemetakan->tetangga_selatan = $ts;
            $pemetakan->tetangga_barat = $tb;
            $pemetakan->bidang_utara = $bu;
            $pemetakan->bidang_timur = $bt;
            $pemetakan->bidang_selatan = $bs;
            $pemetakan->bidang_barat = $bb;
            $pemetakan->info_tanah_id = $tanah->id;
            $pemetakan->save();

            $data_batas = array('tetangga utara' => $tu,
                                'tetangga timur' => $tt,
                                'tetangga selatan' => $ts,
                                'tetangga barat' => $tb,
                                'bidang utara' => $bu,
                                'bidang timur' => $bt,
                                'bidang selatan' => $bs,
                                'bidang barat' => $bb,
                                'identitas tanah' => $tanah->id);
            $log = new Log;
            $log->log = serialize($data_batas);
            $log->keterangan = 'Input Data Batas Tanah';
            $log->users_no_ktp = Auth::user()->no_ktp;
            $log->save();
        }
        // dd($request->input('riwayat'));

        if($request->input('riwayat')!=null){
            foreach ($request->input('riwayat') as $value) {
                $riwayat = new Riwayat;
                $riwayat->nama_riwayat = $value['nama'];
                $riwayat->tanggal_riwayat = $value['sejak'];
                $riwayat->dasar_catatan_riwayat	 = $value['dasar'];
                $riwayat->info_tanah_id	 = $tanah->id;
                $riwayat->save();
                $kTanah = new KeteranganTanah;
                $kTanah->keterangan = $value['keterangan'];
                $kTanah->riwayat_tanah_id = $riwayat->id;
                $kTanah->save();
            }

            $log = new Log;
            $log->log = serialize($request->input('riwayat'));
            $log->keterangan = 'Input Data Riwayat Tanah';
            $log->users_no_ktp = Auth::user()->no_ktp;
            $log->save();
        }
        return redirect('/list');
    }


    public function shop( $id, Request $request)
    {
        // dd($request->input('riwayat'));

        if($request->input('riwayat')!=null){
            foreach ($request->input('riwayat') as $value) {
                $riwayat = new Riwayat;
                $riwayat->nama_riwayat = $value['nama'];
                $riwayat->tanggal_riwayat = $value['sejak'];
                $riwayat->dasar_catatan_riwayat	 = $value['dasar'];
                $riwayat->info_tanah_id	 = $id;
                $riwayat->save();
                $kTanah = new KeteranganTanah;
                $kTanah->keterangan = $value['keterangan'];
                $kTanah->riwayat_tanah_id = $riwayat->id;
                $kTanah->save();
            }

            $log = new Log;
            $log->log = serialize($request->input('riwayat'));
            $log->keterangan = 'Input Data Riwayat Tanah';
            $log->users_no_ktp = Auth::user()->no_ktp;
            $log->save();
        }
        return redirect('/list');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $tanah = Tanah::find($id);
      $maps = Maps::where('info_tanah_id', $id)->first();
      $pemetakan = Pemetakan::where('info_tanah_id', $id)->first();
      if(!$pemetakan)
        $pemetakan = 'Tidak Ada Data';
      $riwayats = Riwayat::where('info_tanah_id', $id)->get();
      $keterangans = array();
      foreach ($riwayats as $riwayat) {
        $keterangan = KeteranganTanah::where('riwayat_tanah_id', $riwayat->id)->get();
        array_push($keterangans, $keterangan);
      }
      if($riwayats->isEmpty()){
          $riwayats = 'Tidak Ada Data';
          $keterangans = 'Tidak Ada Data';
      }
      $konfliks = KeteranganKonflik::where('info_tanah_id', $id)->get();
      if(!$tanah)
        abort(404);
      return view('tanah_detail', ['tanah' => $tanah,
                                    'pemetakan' => $pemetakan,
                                    'riwayats' => $riwayats,
                                    'keterangans' => $keterangans,
                                    'konfliks' =>$konfliks,
                                    'maps'=>$maps,
                                    'id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tanah = Tanah::find($id);
        if($request->status_validasi == "on"){
            $tanah->validasi = true;
        }
        $tanah->persil = $request->nomor_persil_tanah;
        $tanah->luas = $request->luas_tanah;
        $tanah->kelas_desa = $request->kelas_desa_tanah;
        $tanah->ipeda = $request->nomor_ipeda_tanah;
        $tanah->ipeda_r = $request->nomor_ipeda_r_tanah;
        $tanah->ipeda_s = $request->nomor_ipeda_s_tanah;
        $tanah->kondisi = $request->tipe_tanah;
        $tanah->status_sertifikasi = $request->status_sertifikasi;
        $tanah->penggunaan_tanah = serialize($request->penggunaan_tanah);
        $tanah->nib = $request->nomor_identifikasi_tanah;
        $tanah->jalan = $request->jalan_tanah;
        $tanah->blok = $request->blok_tanah;
        $tanah->rt = $request->rt_tanah;
        $tanah->rw = $request->rw_tanah;
        $tanah->kampung = $request->kampung_tanah;
        $tanah->desa = $request->desa_tanah;
        $tanah->kelurahan = $request->kelurahan_tanah;
        $tanah->kecamatan = $request->kecamatan_tanah;
        $tanah->kabupaten = $request->kabupaten_tanah;
        $tanah->provinsi = $request->provinsi_tanah;
        $tanah->save();

        $data_tanah = array('nomor persil tanah' => $request->nomor_persil_tanah,
                            'luas tanah' => $request->luas_tanah,
                            'kelas desa tanah' => $request->kelas_desa_tanah,
                            'nomor ipeda tanah' => $request->nomor_ipeda_tanah,
                            'nomor ipeda r tanah' => $request->nomor_ipeda_r_tanah,
                            'nomor ipeda s tanah' => $request->nomor_ipeda_s_tanah,
                            'tipe tanah' => $request->tipe_tanah,
                            'status sertifikasi' => $request->status_sertifikasi,
                            'penggunaan tanah' => $request->penggunaan_tanah,
                            'nomor identifikasi tanah' => $request->nomor_identifikasi_tanah,
                            'jalan tanah' => $request->jalan_tanah,
                            'blok tanah' => $request->blok_tanah,
                            'rt tanah' => $request->rt_tanah,
                            'rw tanah' => $request->rw_tanah,
                            'kampung tanah' => $request->kampung_tanah,
                            'desa tanah' => $request->desa_tanah,
                            'kelurahan tanah' => $request->kelurahan_tanah,
                            'kecamatan tanah' => $request->kecamatan_tanah,
                            'kabupaten tanah' => $request->kabupaten_tanah,
                            'provinsi tanah' => $request->provinsi_tanah,
                            'nomor identitas pemilik' => $request->nomor_identitas_pemilik
                            );
        $log = new Log;
        $log->log = serialize($data_tanah);
        $log->keterangan = 'Update Data Batas Tanah';
        $log->users_no_ktp = Auth::user()->no_ktp;
        $log->save();

        return redirect('/tanah/'.$id);
    }


    public function updateBatas(Request $request, $id)
    {
        $tanah = Tanah::find($id);
        $tu = $request->tetangga_utara_batas;
        $tt = $request->tetangga_timur_batas;
        $ts = $request->tetangga_selatan_batas;
        $tb = $request->tetangga_barat_batas;
        $bu = $request->bidang_utara_batas;
        $bt = $request->bidang_timur_batas;
        $bs = $request->bidang_selatan_batas;
        $bb = $request->bidang_barat_batas;
        if($tu != "" || $tt != "" || $ts != "" || $tb != "" || $bu != "" || $bt != "" || $bs != "" || $bb != ""){
            $pemetakan = Pemetakan::where('info_tanah_id', $id)->first();
            if($pemetakan == null)
                $pemetakan = new Pemetakan;
            $pemetakan->tetangga_utara = $tu;
            $pemetakan->tetangga_timur = $tt;
            $pemetakan->tetangga_selatan = $ts;
            $pemetakan->tetangga_barat = $tb;
            $pemetakan->bidang_utara = $bu;
            $pemetakan->bidang_timur = $bt;
            $pemetakan->bidang_selatan = $bs;
            $pemetakan->bidang_barat = $bb;
            $pemetakan->info_tanah_id = $tanah->id;
            $pemetakan->save();

            $data_batas = array('tetangga utara' => $tu,
                                'tetangga timur' => $tt,
                                'tetangga selatan' => $ts,
                                'tetangga barat' => $tb,
                                'bidang utara' => $bu,
                                'bidang timur' => $bt,
                                'bidang selatan' => $bs,
                                'bidang barat' => $bb,
                                'identitas tanah' => $tanah->id);
            $log = new Log;
            $log->log = serialize($data_batas);
            $log->keterangan = 'Update Data Batas Tanah';
            $log->users_no_ktp = Auth::user()->no_ktp;
            $log->save();
        }

        return redirect('/tanah/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
