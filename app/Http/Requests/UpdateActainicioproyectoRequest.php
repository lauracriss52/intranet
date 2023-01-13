<?php

namespace App\Http\Requests;

use App\Models\Actainicioproyecto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateActainicioproyectoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('actainicioproyecto_edit');
    }

    public function rules()
    {
        return [
            'proyecto_id' => [
                'required',
                'integer',
            ],
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
