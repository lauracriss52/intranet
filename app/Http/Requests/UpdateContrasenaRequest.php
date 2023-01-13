<?php

namespace App\Http\Requests;

use App\Models\Contrasena;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContrasenaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contrasena_edit');
    }

    public function rules()
    {
        return [
            'usuario' => [
                'string',
                'required',
            ],
            'contrasena' => [
                'string',
                'required',
            ],
            'link_de_la_pagina_a' => [
                'string',
                'nullable',
            ],
        ];
    }
}
