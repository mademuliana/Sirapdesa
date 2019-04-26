<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// home guest
    Route::get('/','HomeController@index');

   //qna
   Route::get('/qna','QnaController@index');
   Route::get('/qnaa','QnaController@edit');
   Route::post('/qnaa', 'QnaController@store'); 
//Routing Login PopUp
    Route::post('/login','LoginController@login');
//Routing login register
    Auth::routes();
// Routing auth
    Route::group(['middleware'=>'auth'], function(){
//general
    Route::get('/home', 'HomeController@showHome');
    Route::get('/about', 'HomeController@showAbout');
//post
    Route::get('/post', 'PostController@index');
    Route::get('/post/make', 'PostController@create');
    Route::post('/post', 'PostController@store');
    Route::get('/post/{id}', 'PostController@show');

//form
    Route::get('/form','FormController@create');
    Route::post('/form','FormController@store');
//pemilik detail
    Route::get('/pemilik/tambah', 'TambahController@pemilik');
    Route::get('/pemilik/{id}', 'PemilikController@show');
    Route::post('/pemilik/{id}/edit', 'PemilikController@edit');
    Route::get('/pemilik/{id}/tambah_tanah', 'TambahController@tanah');
    Route::post('/pemilik/{id}/tambah_tanah', 'TanahController@store');
    Route::post('/pemilik/tambah', 'PemilikController@store');
//tanah detail
    Route::get('/tanah', 'TanahController@index');
    Route::get('/tanah/tambah', 'TambahController@tanah');
    Route::get('/tanah/{id}', 'TanahController@show');
    Route::get('/tanah/{id}/tambahriwayat', 'TambahController@riwayat');
    Route::post('/tanah/{id}/tambahriwayat', 'TanahController@shop')->name('tambah-riwayat');
//validasi lapangan
    Route::get('/validasi_lapangan/{id}/edit', 'FormController@edit')->name('validasi-tanah');
    Route::put('/validasi_lapangan/{id}/edit', 'FormController@update');

//Identifikasi
    Route::get('/form_identifikasi', 'IdentifikasiController@index');
    Route::post('/form_identifikasi', 'IdentifikasiController@store');
    Route::post('/form_identifikasi/edit', 'IdentifikasiController@update');
//validasi data
    Route::get('/validasi_data/{id}', 'FormController@show');
//lapor konflik
    Route::get('/tanah/{id}/lapor_konflik', 'KonflikController@create');
    Route::post('/tanah/{id}/lapor_konflik', 'KonflikController@store');
    Route::get('/konflik/{id}/edit', 'KonflikController@edit');
    Route::put('/konflik/{id}/edit', 'KonflikController@update');
//tambah keterangan
    Route::get('/tambah_keterangan/{id}', 'RiwayatController@create');
    Route::post('/tambah_keterangan/{id}', 'RiwayatController@store');
//print berkas
    Route::get('/print_penguasaan_fisik/{id}', 'PrintController@penguasaan_fisik');


//edit data
    Route::get('/pemilik/{id}/edit', 'EditController@pemilik');
    Route::get('/tanah/{id}/edit/', 'EditController@tanah');
    Route::get('/tanah/{id}/batas/edit/', 'EditController@batas');
    Route::put('/pemilik/{id}', 'PemilikController@update');
    Route::put('/tanah/{id}', 'TanahController@update');
    Route::put('/tanah/{id}/batas', 'TanahController@updateBatas');

    Route::get('/maps',function(){
      return view('cobamaps');
    });

    Route::get('/list', 'PemilikController@index');

    //KaDes
    Route::get('/kades','KadesController@index');
    Route::post('/kades','KadesController@update');
    Route::post('/kades/confirm','KadesController@confirm');
    Route::get('/konflik','KonflikController@update');

    //later c
    Route::get('/upload_later_c/{slug}', 'LaterCController@show');


    //Transaksi
    Route::get('/tanah/{id}/transaksi', 'TransaksiController@index');
    Route::post('/tanah/{id}/transaksi', 'TransaksiController@store');
    });

    Route::get('/table',function(){
        return view('table');
    });

    Route::get('/upload_file', 'ImportFileLaterC@index');
    Route::post('importExcel', 'ImportFileLaterC@importData');





// API Data
//Route::get('/daerah', 'DataController@index');
//Route::get('/daerah/{provinsi}', 'DataController@listProvinsi');
//Route::get('/daerah/{provinsi}/{kabupaten}', 'DataController@listKabupaten');
//Route::get('/daerah/{provinsi}/{kabupaten}/{kecamatan}', 'DataController@listKabupaten');
//Route::get('/daerah/{provinsi}/{kabupaten}/{kecamatan}/{desa}', 'DataController@listDesa');
