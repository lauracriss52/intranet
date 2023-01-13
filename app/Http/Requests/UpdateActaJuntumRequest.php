<?php

namespace App\Http\Requests;

use App\Models\ActaJuntum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateActaJuntumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('acta_juntum_edit');
    }

    public function rules()
    {
        return [
            'fecha' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'hora_inicio' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'hora_final' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'asunto' => [
                'string',
                'max:50',
                'required',
            ],
            'conclusiones' => [
                'required',
            ],
            'compromisos' => [
                'required',
            ],
            'asistentes.*' => [
                'integer',
            ],
            'asistentes' => [
                'required',
                'array',
            ],
        ];
    }
}
