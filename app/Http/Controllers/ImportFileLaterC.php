<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Pemilik;
use App\Tanah;
use Excel;

class ImportFileLaterC extends Controller
{
  public function index()
  {
      return view('upload_file');
  }

  public function importData()
  {
    if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					if($value->sawah_nomor_persil || $value->kering_nomor_persil){
						if($value->no_kohir){
		          list($kohir, $kohir_induk) = explode('/', $value->no_kohir);
							$nama_wajib_ipedea = $value->nama_wajib_ipedea;
							$tempat_tinggal =$value->tempat_tinggal;
						}
						$insert[] = [
							'pemilik' => [
								'no_kohir' => $kohir,
								'no_kohir_induk' => $kohir_induk,
								'nama_wajib_ipedea' => $nama_wajib_ipedea,
								'tempat_tinggal' => $tempat_tinggal,
							],
							'sawah_nomor_persil' => $value->sawah_nomor_persil,
							'sawah_kelas_desa' => $value->sawah_kelas_desa,
							'sawah_ha' => $value->sawah_ha,
							'sawah_da' => $value->sawah_da,
							'sawah_r' => $value->sawah_r,
							'sawah_s' => $value->sawah_s,
							'sawah_sebab_dan_tanggal_perubahan' => $value->sawah_sebab_dan_tanggal_perubahan,
							'kering_nomor_persil' => $value->kering_nomor_persil,
							'kering_kelas_desa' => $value->kering_kelas_desa,
							'kering_ha' => $value->kering_ha,
							'kering_da' => $value->kering_da,
							'kering_r' => $value->kering_r,
							'kering_s' => $value->kering_s,
							'kering_sebab_dan_tanggal_perubahan' => $value->kering_sebab_dan_tanggal_perubahan
						];
					}
				}
				if(!empty($insert)){
					$identifikasi = DB::table('identifikasi')->first();
					$nomor_ipeda_tanah = $identifikasi->nomor_ipeda_tanah;
					$desa_tanah = $identifikasi->nama_desa;
					$kelurahan_tanah = $identifikasi->nama_kelurahan;
					$kecamatan_tanah = $identifikasi->nama_kecamatan;
					$kabupaten_tanah = $identifikasi->nama_kabupaten;
					$provinsi_tanah = $identifikasi->nama_provinsi;
					foreach ($insert as $key => $value) {
						$tempPemilikId;
						if(!Pemilik::where('kohir', '=', $value['pemilik']['no_kohir'])->exists() && !Pemilik::where('nama', '=', $value['pemilik']['nama_wajib_ipedea'])->exists()){
							$pemilik = new Pemilik;
							$pemilik->kohir = $value['pemilik']['no_kohir'];
							$pemilik->kohir_induk = $value['pemilik']['no_kohir_induk'];
							$pemilik->nama = $value['pemilik']['nama_wajib_ipedea'];
							$pemilik->alamat = $value['pemilik']['tempat_tinggal'];
							$pemilik->save();
							$tempPemilikId = $pemilik->id;
						}
						if($value['sawah_nomor_persil']){
							$ha = $value['sawah_ha'];
							$da = $value['sawah_da'];
							if($ha == '-'){
								$ha = 0;
							}
							if($da == '-'){
								$da = 0;
							}
							$totLuas = (($ha * 10000) + ($da * 10));

							$tanah = new Tanah;
							$tanah->persil = $value['sawah_nomor_persil'];
							$tanah->luas = $totLuas;
							$tanah->kondisi = 'Sawah';
							$tanah->kelas_desa =  $value['sawah_kelas_desa'];
							$tanah->ipeda_r = $value['sawah_r'];
							$tanah->ipeda_s = $value['sawah_s'];

							$tanah->ipeda = $nomor_ipeda_tanah;
							$tanah->desa = $desa_tanah;
							$tanah->kelurahan = $kelurahan_tanah;
							$tanah->kecamatan = $kecamatan_tanah;
							$tanah->kabupaten = $kabupaten_tanah;
							$tanah->provinsi = $provinsi_tanah;

							$tanah->pemilik_tanah_id = $tempPemilikId;
							$tanah->save();
						}
						if($value['kering_nomor_persil']){
							$ha = $value['kering_ha'];
							$da = $value['kering_da'];
							if($ha == '-'){
								$ha = 0;
							}
							if($da == '-'){
								$da = 0;
							}
              if (is_numeric($ha) && is_numeric($da)){
                $totLuas = (($ha * 10000) + ($da * 10));
              }

							$tanah = new Tanah;
							$tanah->persil = $value['kering_nomor_persil'];
							$tanah->luas = $totLuas;
							$tanah->kondisi = 'Kering';
							$tanah->kelas_desa =  $value['kering_kelas_desa'];
							$tanah->ipeda_r = $value['kering_r'];
							$tanah->ipeda_s = $value['kering_s'];

							$tanah->ipeda = $nomor_ipeda_tanah;
							$tanah->desa = $desa_tanah;
							$tanah->kelurahan = $kelurahan_tanah;
							$tanah->kecamatan = $kecamatan_tanah;
							$tanah->kabupaten = $kabupaten_tanah;
							$tanah->provinsi = $provinsi_tanah;

							$tanah->pemilik_tanah_id = $tempPemilikId;
							$tanah->save();
						}
					}
				}
			}
		}
		return back();
  }

}
