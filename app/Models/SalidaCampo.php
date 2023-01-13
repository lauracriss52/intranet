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

class SalidaCampo extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const CLIENTE_SELECT = [
        'Frontera'       => 'Frontera',
        'Frontera-Quifa' => 'Frontera-Quifa',
        'Geopark-Tigana' => 'Geopark-Tigana',
        'Geopark-Jacana' => 'Geopark-Jacana',
        'otro'           => 'otro',
    ];

    public $table = 'salida_campos';

    protected $dates = [
        'fecha_de_ingreso',
        'fecha_de_salida',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fecha_de_ingreso',
        'fecha_de_salida',
        'cliente',
        'transporte_casa_aeropuerto',
        'transporte_11',
        'transporte_2',
        'transporte_22',
        'transporte_3',
        'transporte_4',
        'transporte_5',
        'detalle',
        'projecto_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function solicitudSalidascampoauditoria()
    {
        return $this->hasMany(Salidascampoauditorium::class, 'solicitud_id', 'id');
    }

    public function solicitudSalidacampoAudis()
    {
        return $this->hasMany(SalidacampoAudi::class, 'solicitud_id', 'id');
    }

    public function getFechaDeIngresoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeIngresoAttribute($value)
    {
        $this->attributes['fecha_de_ingreso'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFechaDeSalidaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaDeSalidaAttribute($value)
    {
        $this->attributes['fecha_de_salida'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function empleados()
    {
        return $this->belongsToMany(Empleado::class);
    }

    public function projecto()
    {
        return $this->belongsTo(Project::class, 'projecto_id');
    }

    public function proveedors()
    {
        return $this->belongsToMany(CrmCustomer::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
