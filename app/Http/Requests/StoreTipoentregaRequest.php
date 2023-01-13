<?php

namespace App\Http\Requests;

use App\Models\Tipoentrega;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTipoentregaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tipoentrega_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'nullable',
            ],
        ];
    }
}
