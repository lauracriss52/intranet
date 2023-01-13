<?php

namespace App\Http\Requests;

use App\Models\OdsCompraAuditorium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOdsCompraAuditoriumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ods_compra_auditorium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ods_compra_auditoria,id',
        ];
    }
}
