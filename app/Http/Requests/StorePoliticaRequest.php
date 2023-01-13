<?php

namespace App\Http\Requests;

use App\Models\Politica;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePoliticaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('politica_create');
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
