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
                $table->integer('tipo_examen_id')->unsigned();
                $table->foreign('tipo_examen_id')->references('id')->on('tipoexamens');
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
