<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->unsignedBigInteger('asignacion_salarial_id')->nullable();
            $table->foreign('asignacion_salarial_id', 'asignacion_salarial_fk_7855967')->references('id')->on('salarios');
            $table->unsignedBigInteger('certificacion_laboral_id')->nullable();
            $table->foreign('certificacion_laboral_id', 'certificacion_laboral_fk_7855968')->references('id')->on('certificacion_laborals');
        });
    }
}
