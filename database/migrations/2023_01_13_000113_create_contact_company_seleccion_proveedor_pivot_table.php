<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactCompanySeleccionProveedorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('contact_company_seleccion_proveedor', function (Blueprint $table) {
            $table->unsignedBigInteger('seleccion_proveedor_id');
            $table->foreign('seleccion_proveedor_id', 'seleccion_proveedor_id_fk_7867610')->references('id')->on('seleccion_proveedors')->onDelete('cascade');
            $table->unsignedBigInteger('contact_company_id');
            $table->foreign('contact_company_id', 'contact_company_id_fk_7867610')->references('id')->on('contact_companies')->onDelete('cascade');
        });
    }
}
