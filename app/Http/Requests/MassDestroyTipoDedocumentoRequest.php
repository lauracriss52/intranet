<?php

namespace App\Http\Requests;

use App\Models\TipoDedocumento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTipoDedocumentoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tipo_dedocumento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tipo_dedocumentos,id',
        ];
    }
}
