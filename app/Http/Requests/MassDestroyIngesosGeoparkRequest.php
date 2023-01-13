<?php

namespace App\Http\Requests;

use App\Models\IngesosGeopark;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIngesosGeoparkRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ingesos_geopark_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ingesos_geoparks,id',
        ];
    }
}
