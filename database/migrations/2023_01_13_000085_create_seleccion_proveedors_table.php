<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeleccionProveedorsTable extends Migration
{
    public function up()
    {
        Schema::create('seleccion_proveedors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('criterio_1')->nullable();
            $table->string('criterio_2')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
