<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateExamen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('examens', function($table) {
            $table->dropForeign('examens_muestras_id_foreign');
            $table->dropColumn('muestras_id');
            $table->renameColumn('precio', 'precio_normal');
            $table->renameColumn('precio_especial', 'precio_laboratorio');
            $table->decimal('precio_clinica',5,2)->after('precio_especial');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('examens', function($table) {
            $table->integer('muestras_id')->unsigned();
            $table->foreign('muestras_id')->references('id')->on('muestras');
            $table->renameColumn('precio_normal','precio');
            $table->renameColumn('precio_laboratorio','precio_especial');
        });
    }
}
