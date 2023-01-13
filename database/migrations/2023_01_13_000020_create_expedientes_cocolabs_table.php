<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesCocolabsTable extends Migration
{
    public function up()
    {
        Schema::create('expedientes_cocolabs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha')->nullable();
            $table->string('descripcion_expediente');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
