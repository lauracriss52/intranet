<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestoItemsTable extends Migration
{
    public function up()
    {
        Schema::create('presupuesto_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->integer('valor');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
