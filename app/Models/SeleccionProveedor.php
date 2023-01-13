<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeleccionProveedor extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'seleccion_proveedors';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ods_id',
        'criterio_1',
        'criterio_2',
        'empresa_seleccionada_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function ods()
    {
        return $this->belongsTo(Transaction::class, 'ods_id');
    }

    public function proveedors()
    {
        return $this->belongsToMany(ContactCompany::class);
    }

    public function empresa_seleccionada()
    {
        return $this->belongsTo(ContactCompany::class, 'empresa_seleccionada_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
