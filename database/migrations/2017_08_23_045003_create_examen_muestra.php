<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenMuestra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenmuestra', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('examens_id')->unsigned();
            $table->foreign('examens_id')->references('id')->on('examens');
            $table->integer('muestras_id')->unsigned();
            $table->foreign('muestras_id')->references('id')->on('muestras');
            
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
        Schema::dropIfExists('examenmuestra');
    }
}
