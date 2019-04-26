<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// berisi data data info tanah
// (persil, no_akta, tanggal_akta, jalan, blok, luas, desa, kampung, kelurahan, kecamatan,
// nomor_hak, rt, rw, nib)
class CreateInfoTanahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_tanah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('persil');
            $table->string('luas');
            $table->string('kelas_desa');
            $table->string('ipeda');
            $table->string('ipeda_r');
            $table->string('ipeda_s');
            $table->string('kondisi'); //tanah kering atau basah
            // $table->string('no_akta_pendirian')->nullable();
            // $table->date('tanggal_akta_pendirian')->nullable();
            $table->string('penggunaan_tanah')->nullable();
            // $table->string('nama_pengadilan_negri_terdaftar')->nullable();
            // $table->date('tanggal_pengadilan_negri_terdaftar')->nullable();
            // $table->string('no_pengadilan_negri_terdaftar')->nullable();
            $table->string('nib')->nullable();;
            // $table->string('nomor_hak');
            $table->string('jalan')->nullable();
            $table->string('blok')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kampung')->nullable();
            $table->string('desa')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->char('status_sertifikasi', 14)->default('belum');
            $table->boolean('validasi')->default(false);
            $table->boolean('status_konflik')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedInteger('pemilik_tanah_id');
            $table->foreign('pemilik_tanah_id')->references('id')->on('pemilik_tanah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('info_tanah');
    }
}
