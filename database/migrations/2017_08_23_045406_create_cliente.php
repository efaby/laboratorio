<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('cedula',13);
            $table->string('nombres',128);
            $table->string('apellidos',128)->nullable();
            $table->string('direccion',512)->nullable();
            $table->string('telefono',10)->nullable();
            $table->tinyInteger('estado');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
