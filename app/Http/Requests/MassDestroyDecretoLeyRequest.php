<?php

namespace App\Http\Requests;

use App\Models\DecretoLey;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDecretoLeyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('decreto_ley_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:decreto_leys,id',
        ];
    }
}
