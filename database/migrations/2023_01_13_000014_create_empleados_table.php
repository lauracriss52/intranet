<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->integer('cedula');
            $table->integer('telefono');
            $table->string('ciudadcedula')->nullable();
            $table->string('direccion');
            $table->string('cargo')->nullable();
            $table->date('fecha_de_ingreso')->nullable();
            $table->string('tipo_contrato')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
