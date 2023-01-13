<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariosTable extends Migration
{
    public function up()
    {
        Schema::create('salarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('salario', 15, 2);
            $table->date('fecha')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
