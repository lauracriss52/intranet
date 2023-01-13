<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mantenimiento extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'mantenimientos';

    protected $dates = [
        'fecha_programacion',
        'fecha_de_ejecucion',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fecha_programacion',
        'fecha_de_ejecucion',
        'valor',
        'dispositivo_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getFechaProgramacionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaProgramacionAttribute($value)
    {
        $this->attributes['fecha_programacion'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaDeEjecucionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeEjecucionAttribute($value)
    {
        $this->attributes['fecha_de_ejecucion'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function dispositivo()
    {
        return $this->belongsTo(Asset::class, 'dispositivo_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
