<?php

namespace App\Http\Requests;

use App\Models\CertificacionLaboral;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCertificacionLaboralRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('certificacion_laboral_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:certificacion_laborals,id',
        ];
    }
}
