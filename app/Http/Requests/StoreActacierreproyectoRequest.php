<?php

namespace App\Http\Requests;

use App\Models\Actacierreproyecto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreActacierreproyectoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('actacierreproyecto_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'nullable',
            ],
            'fecha' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'orde_de_compra' => [
                'string',
                'nullable',
            ],
            'aprobados.*' => [
                'integer',
            ],
            'aprobados' => [
                'array',
            ],
        ];
    }
}
