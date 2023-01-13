<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmCustomerSalidaCampoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('crm_customer_salida_campo', function (Blueprint $table) {
            $table->unsignedBigInteger('salida_campo_id');
            $table->foreign('salida_campo_id', 'salida_campo_id_fk_7859854')->references('id')->on('salida_campos')->onDelete('cascade');
            $table->unsignedBigInteger('crm_customer_id');
            $table->foreign('crm_customer_id', 'crm_customer_id_fk_7859854')->references('id')->on('crm_customers')->onDelete('cascade');
        });
    }
}
