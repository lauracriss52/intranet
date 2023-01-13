<?php

namespace App\Http\Requests;

use App\Models\Empleado;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmpleadoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('empleado_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
            'estudios.*' => [
                'integer',
            ],
            'estudios' => [
                'required',
                'array',
            ],
            'cedula' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'telefono' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ciudadcedula' => [
                'string',
                'nullable',
            ],
            'direccion' => [
                'string',
                'max:20',
                'required',
            ],
            'documentos_relacionados.*' => [
                'integer',
            ],
            'documentos_relacionados' => [
                'array',
            ],
            'contactos_de_emergencias.*' => [
                'integer',
            ],
            'contactos_de_emergencias' => [
                'array',
            ],
            'experiencia_laborals.*' => [
                'integer',
            ],
            'experiencia_laborals' => [
                'array',
            ],
            'actas_de_entregas.*' => [
                'integer',
            ],
            'actas_de_entregas' => [
                'array',
            ],
            'lista_asistencias.*' => [
                'integer',
            ],
            'lista_asistencias' => [
                'array',
            ],
            'entrega_dotacions.*' => [
                'integer',
            ],
            'entrega_dotacions' => [
                'array',
            ],
            'fecha_de_ingreso' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
