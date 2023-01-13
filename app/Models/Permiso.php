<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permiso extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const TIPO_DE_PERMISO_SELECT = [
        'Licencia Maternidad' => 'Licencia Maternidad',
        'Licencia Paternidad' => 'Licencia Paternidad',
        'Cita Médica'         => 'Cita Médica',
        'Otro'                => 'Otro',
    ];

    public $table = 'permisos';

    public static $searchable = [
        'fecha',
    ];

    protected $dates = [
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tipo_de_permiso',
        'duracion',
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function getFechaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaAttribute($value)
    {
        $this->attributes['fecha'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
