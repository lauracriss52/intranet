<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToListadomaestrosTable extends Migration
{
    public function up()
    {
        Schema::table('listadomaestros', function (Blueprint $table) {
            $table->unsignedBigInteger('proceso_id')->nullable();
            $table->foreign('proceso_id', 'proceso_fk_7840900')->references('id')->on('procesos');
            $table->unsignedBigInteger('tipodocumento_id')->nullable();
            $table->foreign('tipodocumento_id', 'tipodocumento_fk_7840942')->references('id')->on('tipo_dedocumentos');
        });
    }
}
