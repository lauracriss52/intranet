<?php

namespace App\Http\Requests;

use App\Models\DocumentosEmpleadoo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDocumentosEmpleadooRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('documentos_empleadoo_create');
    }

    public function rules()
    {
        return [
            'tipo_de_documento' => [
                'required',
            ],
            'fecha' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'nombre' => [
                'string',
                'required',
            ],
        ];
    }
}
