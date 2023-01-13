<?php

namespace App\Http\Requests;

use App\Models\Tipoentrega;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTipoentregaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tipoentrega_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tipoentregas,id',
        ];
    }
}
