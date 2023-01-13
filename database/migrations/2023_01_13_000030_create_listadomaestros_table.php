<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListadomaestrosTable extends Migration
{
    public function up()
    {
        Schema::create('listadomaestros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo_del_documento');
            $table->integer('version');
            $table->string('estado');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
