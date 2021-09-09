<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('roles_user', function (Blueprint $table) {
            $table->foreignId('roles_id')->references('id')->on('roles')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles_user');
    }
}
