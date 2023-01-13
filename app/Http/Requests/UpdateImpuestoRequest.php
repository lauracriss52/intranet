<?php

namespace App\Http\Requests;

use App\Models\Impuesto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateImpuestoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('impuesto_edit');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'nullable',
            ],
            'valor' => [
                'numeric',
            ],
        ];
    }
}
