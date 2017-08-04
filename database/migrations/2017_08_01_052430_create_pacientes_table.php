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
                $table->string('cedula',13);
                $table->string('nombres',128);
                $table->string('apellidos',128)->nullable();
                $table->date('fecha_nacimiento');
                $table->string('celular',10)->nullable();
                $table->string('direccion',512)->nullable();
                $table->string('telefono',10)->nullable();
                $table->string('genero',3);
                $table->string('enfermedades',1024)->nullable();
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
