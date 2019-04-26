<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PemberitahuanTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pemberitahuan_transaksi', function (Blueprint $table) {
          $table->increments('id');
          $table->string('keterangan');
          $table->string('luas_tanah');
          $table->boolean('status_konfirmasi')->default(false);
          $table->timestamps();
          $table->unsignedInteger('info_tanah_id');
          $table->foreign('info_tanah_id')->references('id')->on('info_tanah');
          $table->unsignedInteger('penjual_tanah_id');
          $table->foreign('penjual_tanah_id')->references('id')->on('pemilik_tanah');
          $table->unsignedInteger('pembeli_tanah_id');
          $table->foreign('pembeli_tanah_id')->references('id')->on('pemilik_tanah');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('pemberitahuan_transaksi');
    }
}
