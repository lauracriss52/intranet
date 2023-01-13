<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidacampoAudisTable extends Migration
{
    public function up()
    {
        Schema::create('salidacampo_audis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('vueloporti')->default(0)->nullable();
            $table->boolean('informar')->default(0)->nullable();
            $table->boolean('viaticos')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
