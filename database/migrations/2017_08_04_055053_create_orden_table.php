<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pacientes_id')->unsigned();
            $table->foreign('pacientes_id')->references('id')->on('tipopacientes');
            $table->integer('user_id');
            $table->date('fecha_emision');
            $table->dateTime('fecha_entrega');
            $table->decimal('abono',5,2);
            $table->tinyInteger('tipo_pago');
            $table->decimal('iva',5,2);
            $table->decimal('subtotal',5,2);
            $table->decimal('total',5,2);
            $table->tinyInteger('estado');

            $table->timestamps();
            
        });

        Schema::table('orden', function($table) {
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
        Schema::dropIfExists('orden');
    }
}
