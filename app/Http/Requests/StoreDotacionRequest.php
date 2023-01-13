<?php

namespace App\Http\Requests;

use App\Models\Dotacion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDotacionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('dotacion_create');
    }

    public function rules()
    {
        return [
            'cantidad' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tipo' => [
                'required',
            ],
            'talla' => [
                'string',
                'required',
            ],
            'genero' => [
                'required',
            ],
        ];
    }
}
