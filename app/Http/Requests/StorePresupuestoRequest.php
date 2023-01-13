<?php

namespace App\Http\Requests;

use App\Models\Presupuesto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePresupuestoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('presupuesto_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
            'descripcion' => [
                'string',
                'nullable',
            ],
            'valor' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'proceso_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
