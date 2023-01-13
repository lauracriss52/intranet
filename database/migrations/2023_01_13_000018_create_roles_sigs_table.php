<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesSigsTable extends Migration
{
    public function up()
    {
        Schema::create('roles_sigs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->date('fecha');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
