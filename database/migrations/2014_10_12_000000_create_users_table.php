<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('no_ktp')->unique();
            $table->string('username')->unique();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telepon');
            $table->unsignedInteger('role')->nullable();
            $table->boolean('active')->default(false);
            $table->rememberToken();
            $table->timestamps();
            $table->primary('no_ktp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
