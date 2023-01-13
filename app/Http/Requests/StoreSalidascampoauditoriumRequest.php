<?php

namespace App\Http\Requests;

use App\Models\Salidascampoauditorium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalidascampoauditoriumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salidascampoauditorium_create');
    }

    public function rules()
    {
        return [];
    }
}
