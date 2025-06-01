<?php

namespace App\Http\Requests;

use App\Models\Beneficiary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBeneficiaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beneficiary_create');
    }

    public function rules()
    {
        return [
            'dob' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'address' => [
                'string',
                'max:2000',
                'nullable',
            ],
            'latitude' => [
                'string',
                'nullable',
            ],
            'longitude' => [
                'string',
                'nullable',
            ],
            'street' => [
                'string',
                'max:255',
                'nullable',
            ],
            'building_number' => [
                'string',
                'max:255',
                'nullable',
            ],
            'floor_number' => [
                'string',
                'max:255',
                'nullable',
            ],
        ];
    }
}
