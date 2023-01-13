<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalidacampoAudi extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'salidacampo_audis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'solicitud_id',
        'vueloporti',
        'informar',
        'viaticos',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function solicitud()
    {
        return $this->belongsTo(SalidaCampo::class, 'solicitud_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
