<?php

namespace App\Http\Requests;

use App\Models\TerminacionContrato;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTerminacionContratoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('terminacion_contrato_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:terminacion_contratos,id',
        ];
    }
}
