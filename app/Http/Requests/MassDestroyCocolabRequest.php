<?php

namespace App\Http\Requests;

use App\Models\Cocolab;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCocolabRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cocolab_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cocolabs,id',
        ];
    }
}
