<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupDummyUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $admin = new User();
        $admin->no_ktp = "0000000000000000";
        $admin->fullname = "Administrator";
        $admin->username = "admin";
        $admin->email = "admin@admin.dev";
        $admin->password = bcrypt("password123");
        $admin->telepon = "08123456789";
        $admin->save();
        $admin->makeSuperAdmin();
        $admin->setActive();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
