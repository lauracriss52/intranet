<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoDedocumento extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'tipo_dedocumentos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nombre',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function tipodocumentoListadomaestros()
    {
        return $this->hasMany(Listadomaestro::class, 'tipodocumento_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
