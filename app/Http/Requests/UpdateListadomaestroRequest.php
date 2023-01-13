<?php

namespace App\Http\Requests;

use App\Models\Listadomaestro;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateListadomaestroRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('listadomaestro_edit');
    }

    public function rules()
    {
        return [
            'codigo_del_documento' => [
                'string',
                'max:20',
                'required',
            ],
            'version' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'archivo' => [
                'required',
            ],
            'proceso_id' => [
                'required',
                'integer',
            ],
            'tipodocumento_id' => [
                'required',
                'integer',
            ],
            'estado' => [
                'required',
            ],
        ];
    }
}
