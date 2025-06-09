<?php

namespace App\Http\Requests\Tenant\Admin;

use App\Models\LettersOrganization;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLettersOrganizationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('letters_organization_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'contact_person' => [
                'string',
                'nullable',
            ],
            'contact_phone' => [
                'string',
                'nullable',
            ],
            'contact_email' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
