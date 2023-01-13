<?php

namespace App\Http\Requests;

use App\Models\Listaasistencium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreListaasistenciumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('listaasistencium_create');
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
        ];
    }
}
