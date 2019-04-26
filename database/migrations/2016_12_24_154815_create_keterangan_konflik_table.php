<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeteranganKonflikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangan_konflik', function (Blueprint $table) {
            $table->increments('id');
            $table->string('keterangan');
            $table->boolean('status_konflik')->default(true);
            $table->boolean('status_konfirmasi')->default(false);
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
        Schema::drop('keterangan_konflik');
    }
}
