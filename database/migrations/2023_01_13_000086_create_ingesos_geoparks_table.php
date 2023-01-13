<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngesosGeoparksTable extends Migration
{
    public function up()
    {
        Schema::create('ingesos_geoparks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('gestionar_documentos')->default(0)->nullable();
            $table->boolean('requerimiento_hse')->default(0)->nullable();
            $table->boolean('diligenciar_formatos')->default(0)->nullable();
            $table->boolean('enviar_documentacion_hse')->default(0)->nullable();
            $table->boolean('solicitar_induccion')->default(0)->nullable();
            $table->boolean('transporte_1')->default(0)->nullable();
            $table->boolean('transporte_2')->default(0)->nullable();
            $table->boolean('hospedaje_1')->default(0)->nullable();
            $table->boolean('hospedaje_villanueva')->default(0)->nullable();
            $table->boolean('viaticos')->default(0)->nullable();
            $table->boolean('notificacion_salida')->default(0)->nullable();
            $table->boolean('transporte_villanueva_bogota')->default(0)->nullable();
            $table->boolean('hospedaje_bogota')->default(0)->nullable();
            $table->boolean('hospedaje_villanueva_salida')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
