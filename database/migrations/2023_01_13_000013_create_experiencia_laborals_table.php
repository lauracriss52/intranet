<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienciaLaboralsTable extends Migration
{
    public function up()
    {
        Schema::create('experiencia_laborals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('empresa');
            $table->date('fecha_de_inicio');
            $table->date('fecha_fin');
            $table->string('correo_telefono');
            $table->string('ubicacion');
            $table->string('cargo_desempenado');
            $table->string('tareas');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
