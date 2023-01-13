<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactoDeEmergenciaTable extends Migration
{
    public function up()
    {
        Schema::create('contacto_de_emergencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('relacion');
            $table->string('telefono');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
