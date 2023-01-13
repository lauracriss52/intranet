<?php

namespace App\Http\Requests;

use App\Models\Actaentrega;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreActaentregaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('actaentrega_create');
    }

    public function rules()
    {
        return [
            'fecha' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'tipo_de_entregas.*' => [
                'integer',
            ],
            'tipo_de_entregas' => [
                'required',
                'array',
            ],
            'ciudad' => [
                'string',
                'max:20',
                'required',
            ],
            'modalidad' => [
                'required',
            ],
            'gestions.*' => [
                'integer',
            ],
            'gestions' => [
                'required',
                'array',
            ],
            'observaciones' => [
                'required',
            ],
            'responsabilidades' => [
                'required',
            ],
            'elaboro_id' => [
                'required',
                'integer',
            ],
            'recibe_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
