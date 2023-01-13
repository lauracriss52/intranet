<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContrasenasTable extends Migration
{
    public function up()
    {
        Schema::create('contrasenas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('usuario');
            $table->string('contrasena');
            $table->string('link_de_la_pagina_a')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
