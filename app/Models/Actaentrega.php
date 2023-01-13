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

class Actaentrega extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const MODALIDAD_RADIO = [
        'Virtual'    => 'Virtual',
        'Presencial' => 'Presencial',
        'Mixta'      => 'Mixta',
    ];

    public $table = 'actaentregas';

    protected $appends = [
        'anexo',
    ];

    protected $dates = [
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fecha',
        'ciudad',
        'modalidad',
        'observaciones',
        'responsabilidades',
        'elaboro_id',
        'recibe_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function actaDecretoLeys()
    {
        return $this->hasMany(DecretoLey::class, 'acta_id', 'id');
    }

    public function actaRucs()
    {
        return $this->hasMany(Ruc::class, 'acta_id', 'id');
    }

    public function actasDeEntregaEmpleados()
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

    public function tipo_de_entregas()
    {
        return $this->belongsToMany(Tipoentrega::class);
    }

    public function gestions()
    {
        return $this->belongsToMany(Proceso::class);
    }

    public function elaboro()
    {
        return $this->belongsTo(Empleado::class, 'elaboro_id');
    }

    public function recibe()
    {
        return $this->belongsTo(Empleado::class, 'recibe_id');
    }

    public function getAnexoAttribute()
    {
        return $this->getMedia('anexo')->last();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
