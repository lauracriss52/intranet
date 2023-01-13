<?php

namespace App\Http\Requests;

use App\Models\Salario;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalarioRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salario_edit');
    }

    public function rules()
    {
        return [
            'salario' => [
                'required',
            ],
            'fecha' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
