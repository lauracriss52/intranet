<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dotacion extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const GENERO_RADIO = [
        'Femenino'  => 'Femenino',
        'Masculina' => 'Masculino',
    ];

    public const TIPO_SELECT = [
        'Polo'               => 'Polo',
        'Camisa manga larga' => 'Camisa manga larga',
        'Camisa Jeasn'       => 'Camisa Jean',
    ];

    public $table = 'dotacions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cantidad',
        'tipo',
        'talla',
        'genero',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function entregaDotacionEmpleados()
    {
        return $this->belongsToMany(Empleado::class);
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
