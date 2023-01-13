<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCocolabEmpleadoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('cocolab_empleado', function (Blueprint $table) {
            $table->unsignedBigInteger('cocolab_id');
            $table->foreign('cocolab_id', 'cocolab_id_fk_7835940')->references('id')->on('cocolabs')->onDelete('cascade');
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'empleado_id_fk_7835940')->references('id')->on('empleados')->onDelete('cascade');
        });
    }
}
