<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('examens', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('tipoexamens_id')->unsigned();
                $table->foreign('tipoexamens_id')->references('id')->on('tipoexamens');
                $table->integer('muestras_id')->unsigned();
                $table->foreign('muestras_id')->references('id')->on('muestras');
                $table->string('nombre');
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
        Schema::drop('examens');
    }

}
