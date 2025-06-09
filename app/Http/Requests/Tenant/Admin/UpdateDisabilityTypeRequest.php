<?php

namespace App\Http\Requests\Tenant\Admin;

use App\Models\DisabilityType;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDisabilityTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('disability_type_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
