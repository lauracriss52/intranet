<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudio extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const NIVEL_EDUCATIVO_SELECT = [
        'Profesional'     => 'Profesional',
        'Especializacion' => 'Especialización',
        'Maestria'        => 'Maestría',
    ];

    public $table = 'estudios';

    protected $dates = [
        'fecha_de_terminacion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'universidad',
        'titulo_adquirido',
        'fecha_de_terminacion',
        'nivel_educativo',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function estudiosEmpleados()
    {
        return $this->belongsToMany(Empleado::class);
    }

    public function getFechaDeTerminacionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeTerminacionAttribute($value)
    {
        $this->attributes['fecha_de_terminacion'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
