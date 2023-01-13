<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoExperienciaLaboralPivotTable extends Migration
{
    public function up()
    {
        Schema::create('empleado_experiencia_laboral', function (Blueprint $table) {
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'empleado_id_fk_7842482')->references('id')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('experiencia_laboral_id');
            $table->foreign('experiencia_laboral_id', 'experiencia_laboral_id_fk_7842482')->references('id')->on('experiencia_laborals')->onDelete('cascade');
        });
    }
}
