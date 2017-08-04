<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('detalleorden_id')->unsigned();
            $table->foreign('detalleorden_id')->references('id')->on('detalleorden');
            $table->text('plantilla');
            $table->tinyInteger('orden')->default(0);

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
        Schema::dropIfExists('resultado');
    }
}
