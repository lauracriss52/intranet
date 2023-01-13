<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacacionesTable extends Migration
{
    public function up()
    {
        Schema::create('vacaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_de_inicio');
            $table->date('fecha_de_finalizacion');
            $table->date('reintegro');
            $table->float('dias', 2, 1);
            $table->boolean('aprobadas')->default(0)->nullable();
            $table->string('perdio_de_vacaciones_que_disfruta');
            $table->float('dias_pendientes', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
