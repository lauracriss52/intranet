<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosEmpleadooEmpleadoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('documentos_empleadoo_empleado', function (Blueprint $table) {
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id', 'empleado_id_fk_7842480')->references('id')->on('empleados')->onDelete('cascade');
            $table->unsignedBigInteger('documentos_empleadoo_id');
            $table->foreign('documentos_empleadoo_id', 'documentos_empleadoo_id_fk_7842480')->references('id')->on('documentos_empleadoos')->onDelete('cascade');
        });
    }
}
