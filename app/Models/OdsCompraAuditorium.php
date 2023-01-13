<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OdsCompraAuditorium extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'ods_compra_auditoria';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'orden_de_servicio_id',
        'proveedor',
        'descuentos',
        'pago',
        'factura',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function orden_de_servicio()
    {
        return $this->belongsTo(Transaction::class, 'orden_de_servicio_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
