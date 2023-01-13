<?php

namespace App\Http\Requests;

use App\Models\DocumentosEmpleadoo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDocumentosEmpleadooRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('documentos_empleadoo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:documentos_empleadoos,id',
        ];
    }
}
