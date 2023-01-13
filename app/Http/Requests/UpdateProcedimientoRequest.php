<?php

namespace App\Http\Requests;

use App\Models\Procedimiento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProcedimientoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('procedimiento_edit');
    }

    public function rules()
    {
        return [
            'codigo' => [
                'string',
                'max:20',
                'nullable',
            ],
            'fecha_de_creacion' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'fecha_actualizacion' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
