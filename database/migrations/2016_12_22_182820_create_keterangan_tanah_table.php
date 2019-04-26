<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeteranganTanahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('keterangan_tanah', function (Blueprint $table) {
             $table->increments('id');
             $table->string('keterangan');
             $table->timestamps();
             $table->integer('riwayat_tanah_id')->unsigned();
             $table->foreign('riwayat_tanah_id')->references('id')->on('riwayat_tanah');
         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('keterangan_tanah');
     }
}
