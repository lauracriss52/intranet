<?php

namespace App\Http\Requests;

use App\Models\ExperienciaLaboral;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExperienciaLaboralRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('experiencia_laboral_edit');
    }

    public function rules()
    {
        return [
            'empresa' => [
                'string',
                'required',
            ],
            'fecha_de_inicio' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'fecha_fin' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'correo_telefono' => [
                'string',
                'required',
            ],
            'ubicacion' => [
                'string',
                'required',
            ],
            'cargo_desempenado' => [
                'string',
                'required',
            ],
            'tareas' => [
                'string',
                'required',
            ],
        ];
    }
}
