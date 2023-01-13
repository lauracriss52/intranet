<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActacierreproyectosTable extends Migration
{
    public function up()
    {
        Schema::create('actacierreproyectos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->date('fecha')->nullable();
            $table->string('orde_de_compra')->nullable();
            $table->longText('resumen_hitos')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
