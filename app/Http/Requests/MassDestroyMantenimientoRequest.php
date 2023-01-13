<?php

namespace App\Http\Requests;

use App\Models\Mantenimiento;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMantenimientoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mantenimiento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mantenimientos,id',
        ];
    }
}
