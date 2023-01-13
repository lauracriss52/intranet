<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoEstudioPivotTable extends Migration
{
    public function up()
    {
        Schema::create('empleado_estudio', function (Blueprint $table) {
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'empleado_id_fk_7832719')->references('id')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('estudio_id');
            $table->foreign('estudio_id', 'estudio_id_fk_7832719')->references('id')->on('estudios')->onDelete('cascade');
        });
    }
}
