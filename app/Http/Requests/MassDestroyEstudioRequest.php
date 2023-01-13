<?php

namespace App\Http\Requests;

use App\Models\Estudio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEstudioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('estudio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:estudios,id',
        ];
    }
}
