<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosEmpleadoosTable extends Migration
{
    public function up()
    {
        Schema::create('documentos_empleadoos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_de_documento');
            $table->date('fecha')->nullable();
            $table->string('nombre');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
