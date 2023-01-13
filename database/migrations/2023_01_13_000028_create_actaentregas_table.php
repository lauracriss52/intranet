<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActaentregasTable extends Migration
{
    public function up()
    {
        Schema::create('actaentregas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->string('ciudad');
            $table->string('modalidad');
            $table->longText('observaciones');
            $table->longText('responsabilidades');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
