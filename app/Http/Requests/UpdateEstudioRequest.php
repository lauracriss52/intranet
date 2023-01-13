<?php

namespace App\Http\Requests;

use App\Models\Estudio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEstudioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('estudio_edit');
    }

    public function rules()
    {
        return [
            'universidad' => [
                'string',
                'required',
            ],
            'titulo_adquirido' => [
                'string',
                'required',
            ],
            'fecha_de_terminacion' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'nivel_educativo' => [
                'required',
            ],
        ];
    }
}
