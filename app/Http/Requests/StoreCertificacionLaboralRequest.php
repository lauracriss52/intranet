<?php

namespace App\Http\Requests;

use App\Models\CertificacionLaboral;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCertificacionLaboralRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('certificacion_laboral_create');
    }

    public function rules()
    {
        return [
            'fecha' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
