<?php

namespace App\Http\Requests;

use App\Models\Permiso;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePermisoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('permiso_create');
    }

    public function rules()
    {
        return [
            'tipo_de_permiso' => [
                'required',
            ],
            'duracion' => [
                'numeric',
                'required',
            ],
            'fecha' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
