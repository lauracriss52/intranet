<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActainicioproyectosTable extends Migration
{
    public function up()
    {
        Schema::create('actainicioproyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->date('fecha')->nullable();
            $table->string('orde_de_compra')->nullable();
            $table->longText('descripcion')->nullable();
            $table->longText('objetivos_objetivos')->nullable();
            $table->longText('resumen_hitos')->nullable();
            $table->decimal('costo', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
