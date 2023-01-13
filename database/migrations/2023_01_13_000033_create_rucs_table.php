<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRucsTable extends Migration
{
    public function up()
    {
        Schema::create('rucs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item')->nullable();
            $table->string('documento_solicitado')->nullable();
            $table->string('estado')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
