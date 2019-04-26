<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

// berisi data data pemilik tanah (no ktp, nama, tanggal_lahir, alamat, no hp, pekerjaan)
class CreatePemilikTanahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilik_tanah', function (Blueprint $table) {
            $table->increments('id');
            $table->char('no_ktp', 16)->nullable()->unique();
            $table->string('kohir');
            $table->string('kohir_induk')->nullable();
            $table->string('nama');
            $table->string('nama_alias')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('no_hp')->nullable();
            $table->text('later_c_url')->nullable();
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
        Schema::drop('pemilik_tanah');
    }
}
