<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ruc extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const ESTADO_RADIO = [
        'pendiente' => 'Pendiente',
        'completo'  => 'Completo',
    ];

    public $table = 'rucs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'item',
        'documento_solicitado',
        'proceso_id',
        'estado',
        'acta_id',
        'lista_asistencia_id',
        'listado_maestro_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function proceso()
    {
        return $this->belongsTo(Proceso::class, 'proceso_id');
    }

    public function acta()
    {
        return $this->belongsTo(Actaentrega::class, 'acta_id');
    }

    public function lista_asistencia()
    {
        return $this->belongsTo(Listaasistencium::class, 'lista_asistencia_id');
    }

    public function listado_maestro()
    {
        return $this->belongsTo(Listadomaestro::class, 'listado_maestro_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
