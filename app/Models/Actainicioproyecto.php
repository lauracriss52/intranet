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

class Actainicioproyecto extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'actainicioproyectos';

    protected $dates = [
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'proyecto_id',
        'nombre',
        'fecha',
        'orde_de_compra',
        'empresa_id',
        'gerente_id',
        'contacto_area_desarrollo_proyecto_id',
        'descripcion',
        'objetivos_objetivos',
        'resumen_hitos',
        'costo',
        'lista_interesados_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function proyecto()
    {
        return $this->belongsTo(Project::class, 'proyecto_id');
    }

    public function getFechaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaAttribute($value)
    {
        $this->attributes['fecha'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function empresa()
    {
        return $this->belongsTo(CrmCustomer::class, 'empresa_id');
    }

    public function gerente()
    {
        return $this->belongsTo(Empleado::class, 'gerente_id');
    }

    public function contacto_area_desarrollo_proyecto()
    {
        return $this->belongsTo(Empleado::class, 'contacto_area_desarrollo_proyecto_id');
    }

    public function lista_interesados()
    {
        return $this->belongsTo(ContactContact::class, 'lista_interesados_id');
    }

    public function aprobados()
    {
        return $this->belongsToMany(Empleado::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
