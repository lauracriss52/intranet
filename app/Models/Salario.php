<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salario extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'salarios';

    protected $dates = [
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'salario',
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function asignacionSalarialEmpleados()
    {
        return $this->hasMany(Empleado::class, 'asignacion_salarial_id', 'id');
    }

    public function salarioCertificacionLaborals()
    {
        return $this->hasMany(CertificacionLaboral::class, 'salario_id', 'id');
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
