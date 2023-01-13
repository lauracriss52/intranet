<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMantenimientosTable extends Migration
{
    public function up()
    {
        Schema::table('mantenimientos', function (Blueprint $table) {
            $table->unsignedBigInteger('dispositivo_id')->nullable();
            $table->foreign('dispositivo_id', 'dispositivo_fk_7866956')->references('id')->on('assets');
        });
    }
}
