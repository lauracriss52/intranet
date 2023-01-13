<?php

namespace App\Http\Requests;

use App\Models\ActividadesCopa;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyActividadesCopaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('actividades_copa_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:actividades_copas,id',
        ];
    }
}
