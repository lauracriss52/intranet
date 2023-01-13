<?php

namespace App\Http\Requests;

use App\Models\Ruc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRucRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ruc_create');
    }

    public function rules()
    {
        return [
            'item' => [
                'string',
                'max:20',
                'nullable',
            ],
            'documento_solicitado' => [
                'string',
                'max:50',
                'nullable',
            ],
        ];
    }
}
