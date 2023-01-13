<?php

namespace App\Http\Requests;

use App\Models\Cocolab;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCocolabRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cocolab_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
            'fecha' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'empleados.*' => [
                'integer',
            ],
            'empleados' => [
                'required',
                'array',
            ],
        ];
    }
}
