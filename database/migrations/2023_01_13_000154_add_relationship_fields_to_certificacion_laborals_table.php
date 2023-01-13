<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCertificacionLaboralsTable extends Migration
{
    public function up()
    {
        Schema::table('certificacion_laborals', function (Blueprint $table) {
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'empleado_fk_7856033')->references('id')->on('empleados');
            $table->unsignedBigInteger('salario_id')->nullable();
            $table->foreign('salario_id', 'salario_fk_7856034')->references('id')->on('salarios');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_7867747')->references('id')->on('teams');
        });
    }
}
