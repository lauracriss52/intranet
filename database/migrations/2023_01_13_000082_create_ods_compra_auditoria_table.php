<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOdsCompraAuditoriaTable extends Migration
{
    public function up()
    {
        Schema::create('ods_compra_auditoria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('proveedor')->default(0)->nullable();
            $table->boolean('descuentos')->default(0)->nullable();
            $table->boolean('pago')->default(0)->nullable();
            $table->boolean('factura')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
