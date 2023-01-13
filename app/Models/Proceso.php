<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proceso extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'procesos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre',
        'lider_del_proceso',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function procesoActaJunta()
    {
        return $this->hasMany(ActaJuntum::class, 'proceso_id', 'id');
    }

    public function procesoPresupuestos()
    {
        return $this->hasMany(Presupuesto::class, 'proceso_id', 'id');
    }

    public function procesoListaasistencia()
    {
        return $this->hasMany(Listaasistencium::class, 'proceso_id', 'id');
    }

    public function procesoListadomaestros()
    {
        return $this->hasMany(Listadomaestro::class, 'proceso_id', 'id');
    }

    public function procesoDecretoLeys()
    {
        return $this->hasMany(DecretoLey::class, 'proceso_id', 'id');
    }

    public function procesoRucs()
    {
        return $this->hasMany(Ruc::class, 'proceso_id', 'id');
    }

    public function procesoPresupuestoItems()
    {
        return $this->hasMany(PresupuestoItem::class, 'proceso_id', 'id');
    }

    public function gestionActaentregas()
    {
        return $this->belongsToMany(Actaentrega::class);
    }

    public function procedimientos()
    {
        return $this->belongsToMany(Procedimiento::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
