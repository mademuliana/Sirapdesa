<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// berisi data data posisi tanah seperti batas tetangga, batas bidang dan kordinat suatu tanah
// (bidang_utara, bidang_timur, bidang_selatan, bidang_barat, tetangga_utara, tetangga_timur, tetangga_selatan, tetangga_barat)
// kordinat
class CreatePemetakanTanahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemetakan_tanah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bidang_utara')->nullable();
            $table->string('bidang_timur')->nullable();
            $table->string('bidang_selatan')->nullable();
            $table->string('bidang_barat')->nullable();
            $table->string('tetangga_utara')->nullable();
            $table->string('tetangga_timur')->nullable();
            $table->string('tetangga_selatan')->nullable();
            $table->string('tetangga_barat');
            $table->string('lng')->nullable();
            $table->string('lat')->nullable();
            $table->string('kordinat')->nullable();
            $table->timestamps();
            $table->unsignedInteger('info_tanah_id')->nullable();
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
        Schema::drop('pemetakan_tanah');
    }
}
