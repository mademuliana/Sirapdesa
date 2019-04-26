<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KeteranganTanah;
use App\Pemetakan;
use App\Pemilik;
use App\Riwayat;
use App\Tanah;
use App\Maps;
use App\Log;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
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
        $tanah = $pemetakan = $pemilik = null;
        return view('form', ['tanah' => $tanah, 'pemetakan' => $pemetakan, 'pemilik' => $pemilik]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        $pemilik = new Pemilik;
        $pemilik->no_ktp = $request->nomor_identitas_pemilik;
        $pemilik->kohir = $request->nomor_kohir_pemilik;
        $pemilik->kohir_induk = $request->nomor_kohir_induk_pemilik;
        $pemilik->nama = $request->nama_pemilik;
        $pemilik->nama_alias = $request->alias_pemilik;
        $pemilik->tanggal_lahir = $request->tgl_lahir_pemilik;
        $pemilik->alamat = $request->alamat_pemilik;
        $pemilik->no_hp = $request->nomor_telepon_pemilik;

        if($request->hasfile('images')){
            
            // foreach ($request as $image => $file) {
            //     // $Orname = $request->getOriginalFileName();
            //     $names = '';
            //     foreach ($request->file('scan_letter_c_tanah') as $scan_letter) {
            //         $Orname = $scan_letter->getClientOriginalName();
            //         $names = $names . ', ' . $Orname;
            //         $filename[]= str_random(6).'_'.$Orname;
            //         $strFromArr = serialize($filename);
            //         $imagePath = public_path() . '/storage/app/upload_later_c'.$strFromArr;
            //         Storage::putFileAs('upload_later_c', $file, $filename);
            //         $pemilik->later_c_url = $filename;
            //     }
            $input=$request->all();
            $images=array();
            if($files=$request->file('images')){
                foreach($files as $file){
                    $name=$file->getClientOriginalName();
                    Storage::putFileAs('upload_later_c', $file,$name );
                    $images[]=$name;
                }
            }
            $conth = json_encode($images);
            $pemilik->later_c_url = $conth;
    //         $lol = json_decode($conth);
    // /*Insert your data*/
    // Post::insert( [
    //     'img_url'=>  $conth,

    //     // implode("|",$images)
    //     //you can put other insertion here
    // ]);


    // return redirect('redirecting page');
           
          
          
        //   $file= $request->file('scan_letter_c_tanah');
        //   // $file= $request->scan_letter_c_tanah;
        //   // $destination_path='upload_later_c/';
        //   $Orname = $file->getClientOriginalName();
        //   $filename= str_random(6).'_'.$Orname;
        //   // $file->move($destination_path,$filename);
        //   Storage::putFileAs('upload_later_c', $file, $filename);
        //   // $pemilik->later_c_url = $destination_path.$filename;
        //   $pemilik->later_c_url = $filename;

        }

        $pemilik->pekerjaan = $request->pekerjaan_pemilik;
        $pemilik->save();

        $data_pemilik = array('no ktp' => $request->nomor_identitas_pemilik,
                      'kohir' => $request->nomor_kohir_pemilik,
                      'kohir induk' => $request->nomor_kohir_induk_pemilik,
                      'nama' => $request->nama_pemilik,
                      'nama alias' => $request->alias_pemilik,
                      'tanggal lahir' => $request->tanggal_lahir,
                      'alamat' => $request->alamat_pemilik,
                      'no hp' => $request->nomor_telepon_pemilik,
                      'later c url' => $conth,
                      'pekerjaan' => $request->pekerjaan_pemilik);
        $log = new Log;
        $log->log = serialize($data_pemilik);
        $log->keterangan = 'Input Data Pemilik Tanah';
        $log->users_no_ktp = Auth::user()->no_ktp;
        $log->save();

        $tanah = new Tanah;
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
        $tanah->pemilik_tanah_id = $pemilik->id;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $tanah = Tanah::find($id);
      $pemilik = Pemilik::find($tanah->pemilik_tanah_id);
      $pemetakan = Pemetakan::where('info_tanah_id', $id)->first();
        if(!$pemetakan)
            $pemetakan = 'Tidak Ada Data';
      if(!$tanah)
        abort(404);
      return view('validasi_data', ['tanah' => $tanah, 'pemetakan' => $pemetakan, 'pemilik' => $pemilik]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tanah = Tanah::find($id);
      $pemilik = Pemilik::find($tanah->pemilik_tanah_id);
      $pemetakan = Pemetakan::where('info_tanah_id', $id)->first();
    if(!$pemetakan)
        $pemetakan = 'Tidak Ada Data';
      if(!$tanah)
        abort(404);
      return view('validasi_lapangan', ['tanah' => $tanah, 'pemetakan' => $pemetakan, 'pemilik' => $pemilik]);
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
        // dd($request->input('koordinat'));
        $tanah = Tanah::find($id);
        if($request->status_validasi == "on"){
            $tanah->validasi = true;
        }
        else {
            $tanah->validasi = false;
        }
        $tanah->persil = $request->nomor_persil_tanah;
        $tanah->luas = $request->luas_tanah;
        $tanah->kelas_desa = $request->kelas_desa_tanah;
        $tanah->ipeda = $request->nomor_ipeda_tanah;
        $tanah->ipeda_r = $request->nomor_ipeda_r_tanah;
        $tanah->ipeda_s = $request->nomor_ipeda_s_tanah;
        $tanah->status_sertifikasi = $request->status_sertifikasi;
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

        $pemilik = Pemilik::find($tanah->pemilik_tanah_id);
        $pemilik->kohir = $request->nomor_kohir_pemilik;
        $pemilik->kohir_induk = $request->nomor_kohir_induk_pemilik;
        $pemilik->nama = $request->nama_pemilik;
        $pemilik->nama_alias = $request->alias_pemilik;
        $pemilik->tanggal_lahir = $request->tgl_lahir_pemilik;
        $pemilik->alamat = $request->alamat_pemilik;
        $pemilik->no_hp = $request->nomor_telepon_pemilik;
        $pemilik->pekerjaan = $request->pekerjaan_pemilik;

        $file= $request->file('scan_letter_c_tanah');
        // $file= $request->scan_letter_c_tanah;
        // $destination_path='upload_later_c/';
        $Orname = $file->getClientOriginalName();
        $filename= str_random(6).'_'.$Orname;
        // $file->move($destination_path,$filename);
        Storage::putFileAs('upload_later_c', $file, $filename);
        // $pemilik->later_c_url = $destination_path.$filename;
        $pemilik->later_c_url = $filename;

        $pemilik->save();

        $data_pemilik = array('no ktp' => $request->nomor_identitas_pemilik,
                      'kohir' => $request->nomor_kohir_pemilik,
                      'kohir induk' => $request->nomor_kohir_induk_pemilik,
                      'nama' => $request->nama_pemilik,
                      'nama alias' => $request->alias_pemilik,
                      'tanggal lahir' => $request->tanggal_lahir,
                      'alamat' => $request->alamat_pemilik,
                      'no hp' => $request->nomor_telepon_pemilik,
                      'pekerjaan' => $request->pekerjaan_pemilik);
        $log = new Log;
        $log->log = serialize($data_pemilik);
        $log->keterangan = 'Update Data Pemilik Tanah';
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
        if($request->input('koordinat')!=null){
            foreach ($request->input('koordinat') as $key => $value) {
                $kordinat = new Maps;
                $kordinat->lat = $value['lat'];
                $kordinat->lon = $value['lon'];
                $kordinat->info_tanah_id = $id;
                $kordinat->save();
            }
            $log = new Log;
            $log->log = serialize($request->input('koordinat'));
            $log->keterangan = 'Insert Data Kordinat Tanah';
            $log->users_no_ktp = Auth::user()->no_ktp;
            $log->save();
        }
        return redirect('/validasi_lapangan/'.$id.'/edit')->with('status', 'Data Berhasil Di Update!');
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
