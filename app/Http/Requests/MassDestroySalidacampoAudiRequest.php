<?php

namespace App\Http\Requests;

use App\Models\SalidacampoAudi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySalidacampoAudiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('salidacampo_audi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:salidacampo_audis,id',
        ];
    }
}
