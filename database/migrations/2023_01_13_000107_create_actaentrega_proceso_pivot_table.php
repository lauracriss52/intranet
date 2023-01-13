<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActaentregaProcesoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('actaentrega_proceso', function (Blueprint $table) {
            $table->unsignedBigInteger('actaentrega_id');
            $table->foreign('actaentrega_id', 'actaentrega_id_fk_7840802')->references('id')->on('actaentregas')->onDelete('cascade');
            $table->unsignedBigInteger('proceso_id');
            $table->foreign('proceso_id', 'proceso_id_fk_7840802')->references('id')->on('procesos')->onDelete('cascade');
        });
    }
}
