<?php

namespace App\Http\Requests;

use App\Models\SalidaCampo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalidaCampoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salida_campo_edit');
    }

    public function rules()
    {
        return [
            'fecha_de_ingreso' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'fecha_de_salida' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'cliente' => [
                'required',
            ],
            'empleados.*' => [
                'integer',
            ],
            'empleados' => [
                'required',
                'array',
            ],
            'transporte_casa_aeropuerto' => [
                'required',
            ],
            'transporte_11' => [
                'string',
                'nullable',
            ],
            'transporte_2' => [
                'required',
            ],
            'transporte_22' => [
                'string',
                'nullable',
            ],
            'transporte_3' => [
                'required',
            ],
            'transporte_4' => [
                'required',
            ],
            'detalle' => [
                'required',
            ],
            'proveedors.*' => [
                'integer',
            ],
            'proveedors' => [
                'array',
            ],
        ];
    }
}
