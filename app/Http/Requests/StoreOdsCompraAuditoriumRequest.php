<?php

namespace App\Http\Requests;

use App\Models\OdsCompraAuditorium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOdsCompraAuditoriumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ods_compra_auditorium_create');
    }

    public function rules()
    {
        return [];
    }
}
