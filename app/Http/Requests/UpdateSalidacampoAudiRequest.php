<?php

namespace App\Http\Requests;

use App\Models\SalidacampoAudi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalidacampoAudiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('salidacampo_audi_edit');
    }

    public function rules()
    {
        return [];
    }
}
