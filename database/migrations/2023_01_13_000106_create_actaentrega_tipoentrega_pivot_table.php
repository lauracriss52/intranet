<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActaentregaTipoentregaPivotTable extends Migration
{
    public function up()
    {
        Schema::create('actaentrega_tipoentrega', function (Blueprint $table) {
            $table->unsignedBigInteger('actaentrega_id');
            $table->foreign('actaentrega_id', 'actaentrega_id_fk_7840837')->references('id')->on('actaentregas')->onDelete('cascade');
            $table->unsignedBigInteger('tipoentrega_id');
            $table->foreign('tipoentrega_id', 'tipoentrega_id_fk_7840837')->references('id')->on('tipoentregas')->onDelete('cascade');
        });
    }
}
