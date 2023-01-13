<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPresupuestosTable extends Migration
{
    public function up()
    {
        Schema::table('presupuestos', function (Blueprint $table) {
            $table->unsignedBigInteger('sgi_id')->nullable();
            $table->foreign('sgi_id', 'sgi_fk_7835958')->references('id')->on('roles_sigs');
            $table->unsignedBigInteger('proceso_id')->nullable();
            $table->foreign('proceso_id', 'proceso_fk_7840340')->references('id')->on('procesos');
        });
    }
}
