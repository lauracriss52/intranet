<?php

namespace App\Http\Requests;

use App\Models\RolesSig;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRolesSigRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('roles_sig_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:roles_sigs,id',
        ];
    }
}
