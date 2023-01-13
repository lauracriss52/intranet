<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoSalidaCampoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('empleado_salida_campo', function (Blueprint $table) {
            $table->unsignedBigInteger('salida_campo_id');
            $table->foreign('salida_campo_id', 'salida_campo_id_fk_7835207')->references('id')->on('salida_campos')->onDelete('cascade');
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'empleado_id_fk_7835207')->references('id')->on('empleados')->onDelete('cascade');
        });
    }
}
