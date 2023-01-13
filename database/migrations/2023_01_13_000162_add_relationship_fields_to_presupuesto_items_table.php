<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPresupuestoItemsTable extends Migration
{
    public function up()
    {
        Schema::table('presupuesto_items', function (Blueprint $table) {
            $table->unsignedBigInteger('proceso_id')->nullable();
            $table->foreign('proceso_id', 'proceso_fk_7867737')->references('id')->on('procesos');
        });
    }
}
