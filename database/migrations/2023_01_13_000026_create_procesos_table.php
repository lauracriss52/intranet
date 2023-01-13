<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcesosTable extends Migration
{
    public function up()
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->string('lider_del_proceso')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
