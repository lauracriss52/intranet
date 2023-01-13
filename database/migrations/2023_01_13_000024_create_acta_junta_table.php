<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActaJuntaTable extends Migration
{
    public function up()
    {
        Schema::create('acta_junta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_final')->nullable();
            $table->string('asunto');
            $table->string('modalidad')->nullable();
            $table->longText('descripcion')->nullable();
            $table->longText('conclusiones');
            $table->longText('compromisos');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
