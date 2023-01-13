<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoRolesSigPivotTable extends Migration
{
    public function up()
    {
        Schema::create('empleado_roles_sig', function (Blueprint $table) {
            $table->unsignedBigInteger('roles_sig_id');
            $table->foreign('roles_sig_id', 'roles_sig_id_fk_7836512')->references('id')->on('roles_sigs')->onDelete('cascade');
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'empleado_id_fk_7836512')->references('id')->on('empleados')->onDelete('cascade');
        });
    }
}
