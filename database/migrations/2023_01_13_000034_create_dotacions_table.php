<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDotacionsTable extends Migration
{
    public function up()
    {
        Schema::create('dotacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad');
            $table->string('tipo');
            $table->string('talla');
            $table->string('genero');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
