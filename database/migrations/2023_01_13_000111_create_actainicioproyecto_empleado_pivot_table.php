<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActainicioproyectoEmpleadoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('actainicioproyecto_empleado', function (Blueprint $table) {
            $table->unsignedBigInteger('actainicioproyecto_id');
            $table->foreign('actainicioproyecto_id', 'actainicioproyecto_id_fk_7856520')->references('id')->on('actainicioproyectos')->onDelete('cascade');
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'empleado_id_fk_7856520')->references('id')->on('empleados')->onDelete('cascade');
        });
    }
}
