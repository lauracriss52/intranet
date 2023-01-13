<?php

namespace App\Http\Requests;

use App\Models\DecretoLey;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDecretoLeyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('decreto_ley_create');
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
