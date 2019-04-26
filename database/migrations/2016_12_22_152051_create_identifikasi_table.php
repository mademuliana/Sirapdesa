<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdentifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identifikasi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jumlah_penduduk');
            $table->string('nomor_surat');
            $table->string('nama_desa');
            $table->string('nama_kelurahan');
            $table->string('nama_kecamatan');
            $table->string('nama_kabupaten');
            $table->string('nama_provinsi');
            $table->string('nomor_ipeda_tanah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('identifikasi');
    }
}
