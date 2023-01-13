<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesCopaEmpleadoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('actividades_copa_empleado', function (Blueprint $table) {
            $table->unsignedBigInteger('actividades_copa_id');
            $table->foreign('actividades_copa_id', 'actividades_copa_id_fk_7837151')->references('id')->on('actividades_copas')->onDelete('cascade');
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'empleado_id_fk_7837151')->references('id')->on('empleados')->onDelete('cascade');
        });
    }
}
