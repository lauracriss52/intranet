<?php

namespace App\Http\Requests;

use App\Models\ContactoDeEmergencium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContactoDeEmergenciumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contacto_de_emergencium_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
            'relacion' => [
                'string',
                'required',
            ],
            'telefono' => [
                'string',
                'required',
            ],
        ];
    }
}
