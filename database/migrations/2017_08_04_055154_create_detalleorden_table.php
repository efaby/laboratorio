<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleordenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleorden', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden_id')->unsigned();
            $table->foreign('orden_id')->references('id')->on('orden');
            $table->integer('examens_id')->unsigned();
            $table->foreign('examens_id')->references('id')->on('examens');
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
        Schema::dropIfExists('detalleorden');
    }
}
