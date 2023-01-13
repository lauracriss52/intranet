<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToActaentregasTable extends Migration
{
    public function up()
    {
        Schema::table('actaentregas', function (Blueprint $table) {
            $table->unsignedBigInteger('elaboro_id')->nullable();
            $table->foreign('elaboro_id', 'elaboro_fk_7840806')->references('id')->on('empleados');
            $table->unsignedBigInteger('recibe_id')->nullable();
            $table->foreign('recibe_id', 'recibe_fk_7840807')->references('id')->on('empleados');
        });
    }
}
