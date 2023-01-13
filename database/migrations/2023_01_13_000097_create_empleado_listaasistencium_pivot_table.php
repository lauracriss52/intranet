<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoListaasistenciumPivotTable extends Migration
{
    public function up()
    {
        Schema::create('empleado_listaasistencium', function (Blueprint $table) {
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'empleado_id_fk_7842484')->references('id')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('listaasistencium_id');
            $table->foreign('listaasistencium_id', 'listaasistencium_id_fk_7842484')->references('id')->on('listaasistencia')->onDelete('cascade');
        });
    }
}
