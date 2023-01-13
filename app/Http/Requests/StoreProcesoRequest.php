<?php

namespace App\Http\Requests;

use App\Models\Proceso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProcesoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('proceso_create');
    }

    public function rules()
    {
        return [
            'procedimientos.*' => [
                'integer',
            ],
            'procedimientos' => [
                'array',
            ],
            'nombre' => [
                'string',
                'nullable',
            ],
            'lider_del_proceso' => [
                'string',
                'max:20',
                'nullable',
            ],
        ];
    }
}
