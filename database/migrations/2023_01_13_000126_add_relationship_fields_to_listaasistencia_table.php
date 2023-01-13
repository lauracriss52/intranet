<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToListaasistenciaTable extends Migration
{
    public function up()
    {
        Schema::table('listaasistencia', function (Blueprint $table) {
            $table->unsignedBigInteger('proceso_id')->nullable();
            $table->foreign('proceso_id', 'proceso_fk_7840485')->references('id')->on('procesos');
            $table->unsignedBigInteger('elaboro_id')->nullable();
            $table->foreign('elaboro_id', 'elaboro_fk_7840487')->references('id')->on('empleados');
        });
    }
}
