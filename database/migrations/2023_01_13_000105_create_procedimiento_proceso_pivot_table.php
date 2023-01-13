<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimientoProcesoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('procedimiento_proceso', function (Blueprint $table) {
            $table->unsignedBigInteger('proceso_id');
            $table->foreign('proceso_id', 'proceso_id_fk_7839925')->references('id')->on('procesos')->onDelete('cascade');
            $table->unsignedBigInteger('procedimiento_id');
            $table->foreign('procedimiento_id', 'procedimiento_id_fk_7839925')->references('id')->on('procedimientos')->onDelete('cascade');
        });
    }
}
