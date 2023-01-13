<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpuestosTable extends Migration
{
    public function up()
    {
        Schema::create('impuestos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->float('valor', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
