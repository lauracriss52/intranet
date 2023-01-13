<?php

namespace App\Http\Requests;

use App\Models\PresupuestoItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPresupuestoItemRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('presupuesto_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:presupuesto_items,id',
        ];
    }
}
