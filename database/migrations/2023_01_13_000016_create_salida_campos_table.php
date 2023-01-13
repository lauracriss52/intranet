<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidaCamposTable extends Migration
{
    public function up()
    {
        Schema::create('salida_campos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_de_ingreso');
            $table->date('fecha_de_salida');
            $table->string('cliente');
            $table->boolean('transporte_casa_aeropuerto')->default(0);
            $table->string('transporte_11')->nullable();
            $table->boolean('transporte_2')->default(0);
            $table->string('transporte_22')->nullable();
            $table->boolean('transporte_3')->default(0);
            $table->boolean('transporte_4')->default(0);
            $table->boolean('transporte_5')->default(0)->nullable();
            $table->longText('detalle');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
