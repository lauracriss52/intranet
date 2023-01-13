<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDecretoLeysTable extends Migration
{
    public function up()
    {
        Schema::table('decreto_leys', function (Blueprint $table) {
            $table->unsignedBigInteger('proceso_id')->nullable();
            $table->foreign('proceso_id', 'proceso_fk_7840984')->references('id')->on('procesos');
            $table->unsignedBigInteger('acta_id')->nullable();
            $table->foreign('acta_id', 'acta_fk_7840986')->references('id')->on('actaentregas');
            $table->unsignedBigInteger('lista_asistencia_id')->nullable();
            $table->foreign('lista_asistencia_id', 'lista_asistencia_fk_7840987')->references('id')->on('listaasistencia');
            $table->unsignedBigInteger('listado_maestro_id')->nullable();
            $table->foreign('listado_maestro_id', 'listado_maestro_fk_7840988')->references('id')->on('listadomaestros');
        });
    }
}
