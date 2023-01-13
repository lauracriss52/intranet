<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Listaasistencium extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const MODALIDAD_RADIO = [
        'Virtual'    => 'Virtual',
        'Presencial' => 'Presencial',
        'Mixta'      => 'Mixta',
    ];

    public $table = 'listaasistencia';

    protected $dates = [
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fecha',
        'hora_inicio',
        'hora_final',
        'temas_a_tratar',
        'proceso_id',
        'modalidad',
        'elaboro_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function listaDeAsistenciaActividadesCopas()
    {
        return $this->hasMany(ActividadesCopa::class, 'lista_de_asistencia_id', 'id');
    }

    public function listaAsistenciaDecretoLeys()
    {
        return $this->hasMany(DecretoLey::class, 'lista_asistencia_id', 'id');
    }

    public function listaAsistenciaRucs()
    {
        return $this->hasMany(Ruc::class, 'lista_asistencia_id', 'id');
    }

    public function listaAsistenciaEmpleados()
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

    public function proceso()
    {
        return $this->belongsTo(Proceso::class, 'proceso_id');
    }

    public function elaboro()
    {
        return $this->belongsTo(Empleado::class, 'elaboro_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
