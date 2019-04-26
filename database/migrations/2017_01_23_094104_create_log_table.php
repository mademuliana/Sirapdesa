<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('log', function (Blueprint $table) {
          $table->increments('id');
          $table->text('log');
          $table->string('keterangan');
          $table->timestamps();
          $table->string('users_no_ktp');
          $table->foreign('users_no_ktp')->references('no_ktp')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('log');
    }
}
