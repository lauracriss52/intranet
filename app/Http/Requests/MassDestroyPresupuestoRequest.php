<?php

namespace App\Http\Requests;

use App\Models\Presupuesto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPresupuestoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('presupuesto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:presupuestos,id',
        ];
    }
}
