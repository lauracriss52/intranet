<?php

namespace App\Http\Requests;

use App\Models\ExpedientesCocolab;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExpedientesCocolabRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('expedientes_cocolab_edit');
    }

    public function rules()
    {
        return [
            'fecha' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'descripcion_expediente' => [
                'string',
                'required',
            ],
        ];
    }
}
