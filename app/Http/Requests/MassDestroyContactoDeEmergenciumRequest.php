<?php

namespace App\Http\Requests;

use App\Models\ContactoDeEmergencium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyContactoDeEmergenciumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('contacto_de_emergencium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:contacto_de_emergencia,id',
        ];
    }
}
