<?php

namespace App\Http\Requests;

use App\Models\SeleccionProveedor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSeleccionProveedorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('seleccion_proveedor_edit');
    }

    public function rules()
    {
        return [
            'proveedors.*' => [
                'integer',
            ],
            'proveedors' => [
                'array',
            ],
            'criterio_1' => [
                'string',
                'nullable',
            ],
            'criterio_2' => [
                'string',
                'nullable',
            ],
        ];
    }
}
