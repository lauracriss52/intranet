<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOdsCompraAuditoriaTable extends Migration
{
    public function up()
    {
        Schema::table('ods_compra_auditoria', function (Blueprint $table) {
            $table->unsignedBigInteger('orden_de_servicio_id')->nullable();
            $table->foreign('orden_de_servicio_id', 'orden_de_servicio_fk_7866655')->references('id')->on('transactions');
        });
    }
}
