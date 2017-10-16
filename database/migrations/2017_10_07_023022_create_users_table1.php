<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('tipousuarios_id')->unsigned();
            $table->foreign('tipousuarios_id')->references('id')->on('tipousuarios');
            $table->string('name');       
            $table->string('cedula',13);
            $table->string('nombres',128);
            $table->string('apellidos',128)->nullable();
            $table->string('direccion',512)->nullable();
            $table->string('email')->unique();
            $table->string('password');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
