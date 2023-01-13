<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientosTable extends Migration
{
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_programacion')->nullable();
            $table->date('fecha_de_ejecucion')->nullable();
            $table->decimal('valor', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
