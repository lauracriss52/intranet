<?php

namespace App\Http\Requests;

use App\Models\ExperienciaLaboral;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExperienciaLaboralRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('experiencia_laboral_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:experiencia_laborals,id',
        ];
    }
}
