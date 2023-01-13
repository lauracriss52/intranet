<?php

namespace App\Http\Requests;

use App\Models\Ruc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRucRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ruc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:rucs,id',
        ];
    }
}
