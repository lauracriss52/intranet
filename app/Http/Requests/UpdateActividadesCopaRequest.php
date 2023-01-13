<?php

namespace App\Http\Requests;

use App\Models\ActividadesCopa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateActividadesCopaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('actividades_copa_edit');
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
