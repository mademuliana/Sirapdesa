<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LatLonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('lat_lon', function (Blueprint $table) {
          $table->increments('id');
          $table->double('lat');
          $table->double('lon');
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
      Schema::drop('lat_lon');
    }
}
