<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToActaJuntaTable extends Migration
{
    public function up()
    {
        Schema::table('acta_junta', function (Blueprint $table) {
            $table->unsignedBigInteger('proceso_id')->nullable();
            $table->foreign('proceso_id', 'proceso_fk_7840165')->references('id')->on('procesos');
            $table->unsignedBigInteger('elaboro_id')->nullable();
            $table->foreign('elaboro_id', 'elaboro_fk_7840170')->references('id')->on('empleados');
        });
    }
}
