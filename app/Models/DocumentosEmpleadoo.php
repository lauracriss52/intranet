<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentosEmpleadoo extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const TIPO_DE_DOCUMENTO_SELECT = [
        'Cedula'       => 'Cédula',
        'Hoja de Vida' => 'Hoja de Vida con todos los soportes',
        'Acta'         => 'Acta',
        'Vacuna'       => 'Vacuna',
        'Contrato'     => 'Contrato',
    ];

    public $table = 'documentos_empleadoos';

    protected $dates = [
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tipo_de_documento',
        'fecha',
        'nombre',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function documentosRelacionadosEmpleados()
    {
        return $this->belongsToMany(Empleado::class);
    }

    public function getFechaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaAttribute($value)
    {
        $this->attributes['fecha'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
