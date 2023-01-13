<?php

namespace App\Http\Requests;

use App\Models\ExpedientesCocolab;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExpedientesCocolabRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('expedientes_cocolab_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:expedientes_cocolabs,id',
        ];
    }
}
