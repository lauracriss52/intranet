<?php

namespace App\Http\Requests;

use App\Models\IngesosGeopark;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIngesosGeoparkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ingesos_geopark_create');
    }

    public function rules()
    {
        return [];
    }
}
