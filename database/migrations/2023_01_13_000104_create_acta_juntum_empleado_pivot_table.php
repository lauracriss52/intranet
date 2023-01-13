<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActaJuntumEmpleadoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('acta_juntum_empleado', function (Blueprint $table) {
            $table->unsignedBigInteger('acta_juntum_id');
            $table->foreign('acta_juntum_id', 'acta_juntum_id_fk_7840171')->references('id')->on('acta_junta')->onDelete('cascade');
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'empleado_id_fk_7840171')->references('id')->on('empleados')->onDelete('cascade');
        });
    }
}
