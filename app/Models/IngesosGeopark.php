<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IngesosGeopark extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'ingesos_geoparks';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'gestionar_documentos',
        'requerimiento_hse',
        'diligenciar_formatos',
        'enviar_documentacion_hse',
        'solicitar_induccion',
        'transporte_1',
        'transporte_2',
        'hospedaje_1',
        'hospedaje_villanueva',
        'viaticos',
        'notificacion_salida',
        'transporte_villanueva_bogota',
        'hospedaje_bogota',
        'hospedaje_villanueva_salida',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
