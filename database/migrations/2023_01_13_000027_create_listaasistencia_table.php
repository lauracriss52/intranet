<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaasistenciaTable extends Migration
{
    public function up()
    {
        Schema::create('listaasistencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_final')->nullable();
            $table->longText('temas_a_tratar')->nullable();
            $table->string('modalidad')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
