<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActaentregaEmpleadoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('actaentrega_empleado', function (Blueprint $table) {
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'empleado_id_fk_7842483')->references('id')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('actaentrega_id');
            $table->foreign('actaentrega_id', 'actaentrega_id_fk_7842483')->references('id')->on('actaentregas')->onDelete('cascade');
        });
    }
}
