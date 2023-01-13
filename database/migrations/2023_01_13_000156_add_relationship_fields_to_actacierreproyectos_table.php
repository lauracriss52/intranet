<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToActacierreproyectosTable extends Migration
{
    public function up()
    {
        Schema::table('actacierreproyectos', function (Blueprint $table) {
            $table->unsignedBigInteger('proyecto_id')->nullable();
            $table->foreign('proyecto_id', 'proyecto_fk_7859748')->references('id')->on('projects');
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id', 'empresa_fk_7859752')->references('id')->on('crm_customers');
            $table->unsignedBigInteger('administrador_id')->nullable();
            $table->foreign('administrador_id', 'administrador_fk_7859753')->references('id')->on('empleados');
            $table->unsignedBigInteger('contacto_area_desarrollo_proyecto_id')->nullable();
            $table->foreign('contacto_area_desarrollo_proyecto_id', 'contacto_area_desarrollo_proyecto_fk_7859754')->references('id')->on('empleados');
            $table->unsignedBigInteger('lista_interesados_id')->nullable();
            $table->foreign('lista_interesados_id', 'lista_interesados_fk_7859756')->references('id')->on('contact_contacts');
        });
    }
}
