<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActacierreproyectoEmpleadoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('actacierreproyecto_empleado', function (Blueprint $table) {
            $table->unsignedBigInteger('actacierreproyecto_id');
            $table->foreign('actacierreproyecto_id', 'actacierreproyecto_id_fk_7859757')->references('id')->on('actacierreproyectos')->onDelete('cascade');
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'empleado_id_fk_7859757')->references('id')->on('empleados')->onDelete('cascade');
        });
    }
}
