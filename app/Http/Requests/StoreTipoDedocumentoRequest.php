<?php

namespace App\Http\Requests;

use App\Models\TipoDedocumento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTipoDedocumentoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tipo_dedocumento_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'max:20',
                'required',
            ],
        ];
    }
}
