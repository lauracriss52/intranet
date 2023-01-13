<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToActividadesCopasTable extends Migration
{
    public function up()
    {
        Schema::table('actividades_copas', function (Blueprint $table) {
            $table->unsignedBigInteger('lista_de_asistencia_id')->nullable();
            $table->foreign('lista_de_asistencia_id', 'lista_de_asistencia_fk_7840958')->references('id')->on('listaasistencia');
            $table->unsignedBigInteger('acta_id')->nullable();
            $table->foreign('acta_id', 'acta_fk_7840959')->references('id')->on('acta_junta');
        });
    }
}
