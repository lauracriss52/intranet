<?php

namespace App\Http\Requests;

use App\Models\Salidascampoauditorium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalidascampoauditoriumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salidascampoauditorium_edit');
    }

    public function rules()
    {
        return [];
    }
}
