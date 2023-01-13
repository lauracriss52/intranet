<?php

namespace App\Http\Requests;

use App\Models\ActaJuntum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyActaJuntumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('acta_juntum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:acta_junta,id',
        ];
    }
}
