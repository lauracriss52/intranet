<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiosTable extends Migration
{
    public function up()
    {
        Schema::create('estudios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('universidad');
            $table->string('titulo_adquirido');
            $table->date('fecha_de_terminacion');
            $table->string('nivel_educativo');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
