<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// berisi data data riwayat atau history tanah (tanggal_riwayat, nama_riwayat, dasar_catatan_riwayat)
class CreateRiwayatTanahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_tanah', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_riwayat');
            $table->string('nama_riwayat');
            $table->string('dasar_catatan_riwayat');
            $table->timestamps();
            $table->unsignedInteger('info_tanah_id');
            $table->foreign('info_tanah_id')->references('id')->on('info_tanah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('riwayat_tanah');
    }
}
