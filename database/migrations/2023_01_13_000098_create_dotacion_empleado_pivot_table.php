<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDotacionEmpleadoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('dotacion_empleado', function (Blueprint $table) {
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'empleado_id_fk_7845401')->references('id')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('dotacion_id');
            $table->foreign('dotacion_id', 'dotacion_id_fk_7845401')->references('id')->on('dotacions')->onDelete('cascade');
        });
    }
}
