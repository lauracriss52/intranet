<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToActainicioproyectosTable extends Migration
{
    public function up()
    {
        Schema::table('actainicioproyectos', function (Blueprint $table) {
            $table->unsignedBigInteger('proyecto_id')->nullable();
            $table->foreign('proyecto_id', 'proyecto_fk_7859790')->references('id')->on('projects');
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id', 'empresa_fk_7856512')->references('id')->on('crm_customers');
            $table->unsignedBigInteger('gerente_id')->nullable();
            $table->foreign('gerente_id', 'gerente_fk_7856513')->references('id')->on('empleados');
            $table->unsignedBigInteger('contacto_area_desarrollo_proyecto_id')->nullable();
            $table->foreign('contacto_area_desarrollo_proyecto_id', 'contacto_area_desarrollo_proyecto_fk_7856514')->references('id')->on('empleados');
            $table->unsignedBigInteger('lista_interesados_id')->nullable();
            $table->foreign('lista_interesados_id', 'lista_interesados_fk_7856519')->references('id')->on('contact_contacts');
        });
    }
}
