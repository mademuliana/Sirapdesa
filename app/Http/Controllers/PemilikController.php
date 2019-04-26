<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemilik;
use App\Tanah;
use App\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pemiliks = Pemilik::all();
        $tanah_alls = Tanah::all();
        $tanahs = array();
        foreach ($pemiliks as $pemilik){
            $tanah = Tanah::where('pemilik_tanah_id', $pemilik->id)->get();
            array_push($tanahs, $tanah);
        }

        $pemilik_tanahs = array();
        foreach ($tanah_alls as $tanah_all){
            $pemilik_tanah = Pemilik::where('id', $tanah_all->pemilik_tanah_id)->first();
            array_push($pemilik_tanahs, $pemilik_tanah);
        }
        return view('list',['pemiliks' => $pemiliks, 'tanahs'=> $tanahs, 'tanah_alls' => $tanah_alls,
            'pemilik_tanahs' => $pemilik_tanahs]);
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
    public function store(Request $request)
    {
        // dd(Auth::user()->no_ktp);
        $pemilik = new Pemilik;
        $pemilik->no_ktp = $request->nomor_identitas_pemilik;
        $pemilik->kohir = $request->nomor_kohir_pemilik;
        $pemilik->kohir_induk = $request->nomor_kohir_induk_pemilik;
        $pemilik->nama = $request->nama_pemilik;
        $pemilik->nama_alias = $request->alias_pemilik;
        $pemilik->tanggal_lahir = $request->tgl_lahir_pemilik;
        $pemilik->alamat = $request->alamat_pemilik;
        $pemilik->no_hp = $request->nomor_telepon_pemilik;

        $file= $request->file('scan_letter_c_tanah');
        // $file= $request->scan_letter_c_tanah;
        // $destination_path='upload_later_c/';
        $Orname = $file->getClientOriginalName();
        $filename= str_random(6).'_'.$Orname;
        // $file->move($destination_path,$filename);
        Storage::putFileAs('upload_later_c', $file, $filename);
        // $pemilik->later_c_url = $destination_path.$filename;
        $pemilik->later_c_url = $filename;

        $pemilik->pekerjaan = $request->pekerjaan_pemilik;
        $pemilik->save();
        $data = array('no ktp' => $request->nomor_identitas_pemilik,
                      'kohir' => $request->nomor_kohir_pemilik,
                      'kohir induk' => $request->nomor_kohir_induk_pemilik,
                      'nama' => $request->nama_pemilik,
                      'nama alias' => $request->alias_pemilik,
                      'tanggal lahir' => $request->tanggal_lahir,
                      'alamat' => $request->alamat_pemilik,
                      'no hp' => $request->nomor_telepon_pemilik,
                      'later c url' => $filename,
                      'pekerjaan' => $request->pekerjaan_pemilik);
        $log = new Log;
        $log->log = serialize($data);
        $log->keterangan = 'Input Data Pemilik Tanah';
        $log->users_no_ktp = Auth::user()->no_ktp;
        $log->save();

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
              $pemilik = Pemilik::find($id);
              $tanahs = Tanah::where('pemilik_tanah_id', $id)->get();
              if (!$pemilik)
                  abort(404);
              return view('pemilik_detail', ['pemilik' => $pemilik, 'tanahs' => $tanahs]);

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
      $pemilik = Pemilik::find($id);
      $pemilik->no_ktp = $request->nomor_identitas_pemilik;
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

      $data = array('no ktp' => $request->nomor_identitas_pemilik,
                    'kohir' => $request->nomor_kohir_pemilik,
                    'kohir induk' => $request->nomor_kohir_induk_pemilik,
                    'nama' => $request->nama_pemilik,
                    'nama alias' => $request->alias_pemilik,
                    'tanggal lahir' => $request->tanggal_lahir,
                    'alamat' => $request->alamat_pemilik,
                    'no hp' => $request->nomor_telepon_pemilik,
                    'pekerjaan' => $request->pekerjaan_pemilik);
      $log = new Log;
      $log->log = serialize($data);
      $log->keterangan = 'Update Data Pemilik Tanah';
      $log->users_no_ktp = Auth::user()->no_ktp;
      $log->save();

      return redirect('/list');
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
