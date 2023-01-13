<?php

namespace App\Http\Requests;

use App\Models\TerminacionContrato;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTerminacionContratoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('terminacion_contrato_create');
    }

    public function rules()
    {
        return [
            'fecha_terminacion' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
