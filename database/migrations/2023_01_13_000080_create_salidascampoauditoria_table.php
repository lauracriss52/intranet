<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidascampoauditoriaTable extends Migration
{
    public function up()
    {
        Schema::create('salidascampoauditoria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('gestionar_documentos')->default(0)->nullable();
            $table->boolean('solicitud_de_transporte')->default(0)->nullable();
            $table->boolean('vuelo')->default(0)->nullable();
            $table->boolean('formulario_edica')->default(0)->nullable();
            $table->boolean('covid')->default(0)->nullable();
            $table->boolean('induccion_campo')->default(0)->nullable();
            $table->boolean('estado')->default(0)->nullable();
            $table->boolean('matriz')->default(0)->nullable();
            $table->boolean('excel')->default(0)->nullable();
            $table->boolean('informar')->default(0)->nullable();
            $table->boolean('ods')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
