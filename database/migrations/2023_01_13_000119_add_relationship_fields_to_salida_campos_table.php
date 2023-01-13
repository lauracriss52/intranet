<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalidaCamposTable extends Migration
{
    public function up()
    {
        Schema::table('salida_campos', function (Blueprint $table) {
            $table->unsignedBigInteger('projecto_id')->nullable();
            $table->foreign('projecto_id', 'projecto_fk_7856170')->references('id')->on('projects');
        });
    }
}
