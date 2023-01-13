<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salidascampoauditorium extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'salidascampoauditoria';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'solicitud_id',
        'gestionar_documentos',
        'solicitud_de_transporte',
        'vuelo',
        'formulario_edica',
        'covid',
        'induccion_campo',
        'estado',
        'matriz',
        'excel',
        'informar',
        'ods',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function solicitud()
    {
        return $this->belongsTo(SalidaCampo::class, 'solicitud_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
