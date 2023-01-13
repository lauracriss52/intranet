<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRolesSigsTable extends Migration
{
    public function up()
    {
        Schema::table('roles_sigs', function (Blueprint $table) {
            $table->unsignedBigInteger('secretario_id')->nullable();
            $table->foreign('secretario_id', 'secretario_fk_7836513')->references('id')->on('empleados');
            $table->unsignedBigInteger('presidente_suplente_id')->nullable();
            $table->foreign('presidente_suplente_id', 'presidente_suplente_fk_7836514')->references('id')->on('empleados');
            $table->unsignedBigInteger('secretario_suplente_id')->nullable();
            $table->foreign('secretario_suplente_id', 'secretario_suplente_fk_7836515')->references('id')->on('empleados');
        });
    }
}
