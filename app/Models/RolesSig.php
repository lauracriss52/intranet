<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolesSig extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'roles_sigs';

    protected $dates = [
        'fecha',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre',
        'fecha',
        'secretario_id',
        'presidente_suplente_id',
        'secretario_suplente_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function sgiPresupuestos()
    {
        return $this->hasMany(Presupuesto::class, 'sgi_id', 'id');
    }

    public function getFechaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFechaAttribute($value)
    {
        $this->attributes['fecha'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function presidentes()
    {
        return $this->belongsToMany(Empleado::class);
    }

    public function secretario()
    {
        return $this->belongsTo(Empleado::class, 'secretario_id');
    }

    public function presidente_suplente()
    {
        return $this->belongsTo(Empleado::class, 'presidente_suplente_id');
    }

    public function secretario_suplente()
    {
        return $this->belongsTo(Empleado::class, 'secretario_suplente_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
