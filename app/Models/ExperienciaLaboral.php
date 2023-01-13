<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperienciaLaboral extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'experiencia_laborals';

    protected $dates = [
        'fecha_de_inicio',
        'fecha_fin',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'empresa',
        'fecha_de_inicio',
        'fecha_fin',
        'correo_telefono',
        'ubicacion',
        'cargo_desempenado',
        'tareas',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function experienciaLaboralEmpleados()
    {
        return $this->belongsToMany(Empleado::class);
    }

    public function getFechaDeInicioAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeInicioAttribute($value)
    {
        $this->attributes['fecha_de_inicio'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaFinAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaFinAttribute($value)
    {
        $this->attributes['fecha_fin'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
