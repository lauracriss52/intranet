<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosTable extends Migration
{
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_de_permiso');
            $table->float('duracion', 2, 1);
            $table->date('fecha');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
