<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('pacientes', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('tipopacientes_id')->unsigned();
                $table->foreign('tipopacientes_id')->references('id')->on('tipopacientes');
                $table->string('cedula');
                $table->string('nombres');
                $table->string('apellidos');
                $table->date('fecha_nacimiento');
                $table->string('celular');
                $table->string('direccion');
                $table->string('telefono');
                $table->string('genero');
                $table->string('enfermedades');
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
        Schema::drop('pacientes');
    }

}
