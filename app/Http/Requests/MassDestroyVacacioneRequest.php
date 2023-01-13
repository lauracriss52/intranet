<?php

namespace App\Http\Requests;

use App\Models\Vacacione;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVacacioneRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('vacacione_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:vacaciones,id',
        ];
    }
}
