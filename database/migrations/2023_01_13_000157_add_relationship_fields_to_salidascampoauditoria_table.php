<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalidascampoauditoriaTable extends Migration
{
    public function up()
    {
        Schema::table('salidascampoauditoria', function (Blueprint $table) {
            $table->unsignedBigInteger('solicitud_id')->nullable();
            $table->foreign('solicitud_id', 'solicitud_fk_7866635')->references('id')->on('salida_campos');
        });
    }
}
