<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimientosTable extends Migration
{
    public function up()
    {
        Schema::create('procedimientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo')->nullable();
            $table->date('fecha_de_creacion');
            $table->date('fecha_actualizacion');
            $table->longText('nota_del_procedimiento')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
