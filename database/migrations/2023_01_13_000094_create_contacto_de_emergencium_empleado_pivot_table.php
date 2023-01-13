<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactoDeEmergenciumEmpleadoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('contacto_de_emergencium_empleado', function (Blueprint $table) {
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'empleado_id_fk_7842481')->references('id')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('contacto_de_emergencium_id');
            $table->foreign('contacto_de_emergencium_id', 'contacto_de_emergencium_id_fk_7842481')->references('id')->on('contacto_de_emergencia')->onDelete('cascade');
        });
    }
}
