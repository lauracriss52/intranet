<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSeleccionProveedorsTable extends Migration
{
    public function up()
    {
        Schema::table('seleccion_proveedors', function (Blueprint $table) {
            $table->unsignedBigInteger('ods_id')->nullable();
            $table->foreign('ods_id', 'ods_fk_7867609')->references('id')->on('transactions');
            $table->unsignedBigInteger('empresa_seleccionada_id')->nullable();
            $table->foreign('empresa_seleccionada_id', 'empresa_seleccionada_fk_7867613')->references('id')->on('contact_companies');
        });
    }
}
