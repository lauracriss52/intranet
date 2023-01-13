<?php

namespace App\Http\Requests;

use App\Models\Vacacione;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVacacioneRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vacacione_edit');
    }

    public function rules()
    {
        return [
            'fecha_de_inicio' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'fecha_de_finalizacion' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'reintegro' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'dias' => [
                'numeric',
                'required',
                'max:15',
            ],
            'perdio_de_vacaciones_que_disfruta' => [
                'string',
                'required',
            ],
            'empleado_id' => [
                'required',
                'integer',
            ],
            'dias_pendientes' => [
                'numeric',
            ],
        ];
    }
}
