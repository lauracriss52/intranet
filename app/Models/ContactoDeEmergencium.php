<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactoDeEmergencium extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'contacto_de_emergencia';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre',
        'relacion',
        'telefono',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function contactosDeEmergenciaEmpleados()
    {
        return $this->belongsToMany(Empleado::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
