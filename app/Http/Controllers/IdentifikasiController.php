<?php
/**
 * Created by PhpStorm.
 * User: Chevalier
 * Date: 25/11/2017
 * Time: 23:16
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Identifikasi;

class IdentifikasiController
{
    public function index(){
        $identfikasi = Identifikasi::first();

        return view('form_identifikasi',['identifikasi' => $identfikasi]);
    }

    public function store(Request $request){
        $identfikasi = new Identifikasi();
        $identfikasi ->jumlah_penduduk= $request->jumlah_penduduk_identifikasi;
        $identfikasi ->nomor_surat= $request->nomor_surat_identifikasi;
        $identfikasi ->nama_desa= $request->nama_desa_identifikasi;
        $identfikasi ->nama_kelurahan= $request->nama_kelurahan_identifikasi;
        $identfikasi ->nama_kecamatan= $request->nama_kecamatan_identifikasi;
        $identfikasi ->nama_kabupaten= $request->nama_kabupaten_identifikasi;
        $identfikasi ->nama_provinsi= $request->nama_provinsi_identifikasi;
        $identfikasi ->nomor_ipeda_tanah= $request->nomor_ipeda_identifikasi;
        $identfikasi ->save();
        return redirect('/form_identifikasi');
    }

    public function update(Request $request){

        // YANG INI DONGN OM, BENARKAN

        $identfikasi = Identifikasi::find(1);
        $identfikasi ->jumlah_penduduk= $request->jumlah_penduduk_identifikasi;
        $identfikasi ->nomor_surat= $request->nomor_surat_identifikasi;
        $identfikasi ->nama_desa= $request->nama_desa_identifikasi;
        $identfikasi ->nama_kelurahan= $request->nama_kelurahan_identifikasi;
        $identfikasi ->nama_kecamatan= $request->nama_kecamatan_identifikasi;
        $identfikasi ->nama_kabupaten= $request->nama_kabupaten_identifikasi;
        $identfikasi ->nama_provinsi= $request->nama_provinsi_identifikasi;
        $identfikasi ->nomor_ipeda_tanah= $request->nomor_ipeda_identifikasi;
        $identfikasi ->save();
        return redirect('/form_identifikasi')->with('status', 'Data Berhasil Di Update!');
    }
}