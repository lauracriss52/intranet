<?php

namespace App\Http\Requests;

use App\Models\SeleccionProveedor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySeleccionProveedorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('seleccion_proveedor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:seleccion_proveedors,id',
        ];
    }
}
