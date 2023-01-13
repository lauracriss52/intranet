<?php

namespace App\Http\Requests;

use App\Models\RolesSig;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRolesSigRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('roles_sig_edit');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'max:20',
                'required',
            ],
            'fecha' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'presidentes.*' => [
                'integer',
            ],
            'presidentes' => [
                'array',
            ],
        ];
    }
}
