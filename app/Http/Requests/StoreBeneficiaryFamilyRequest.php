<?php

namespace App\Http\Requests;

use App\Models\BeneficiaryFamily;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBeneficiaryFamilyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beneficiary_family_create');
    }

    public function rules()
    {
        return [
            'beneficiary_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'max:255',
                'nullable',
            ],
            'dob' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'max:255',
                'nullable',
            ],
        ];
    }
}
