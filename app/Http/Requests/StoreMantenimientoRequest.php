<?php

namespace App\Http\Requests;

use App\Models\Mantenimiento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMantenimientoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mantenimiento_create');
    }

    public function rules()
    {
        return [
            'fecha_programacion' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'fecha_de_ejecucion' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
