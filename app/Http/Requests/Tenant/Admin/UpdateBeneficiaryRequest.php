<?php

namespace App\Http\Requests\Tenant\Admin;

use App\Models\Beneficiary;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBeneficiaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beneficiary_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:' . config('panel.max_characters_short'),
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . $this->route('beneficiary')->user->id,
                'email',
                'max:' . config('panel.max_characters_short'),
            ], 
            'phone' => [ 
                'required',
                config('panel.phone_validation'),
                'unique:users,phone,' . $this->route('beneficiary')->user->id,
            ],
            'phone_2' => [
                config('panel.phone_validation'),
                'nullable',
            ], 
            'identity_num' => [ 
                'required',
                'unique:users,identity_num,' . $this->route('beneficiary')->user->id,
                config('panel.identity_validation'),
            ],
            'dob' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'address' => [ 
                'max:' . config('panel.max_characters_long'),
                'nullable',
            ], 
            'street' => [
                'string',
                'max:' . config('panel.max_characters_short'),
                'nullable',
            ],
            'building_number' => [
                'string',
                'max:' . config('panel.max_characters_short'),
                'nullable',
            ],
            'floor_number' => [
                'string',
                'max:' . config('panel.max_characters_short'),
                'nullable',
            ],
            'expenses.*' => [ 
                'nullable',
                'max:' . config('panel.max_characters_short'),   
            ],
            'expenses' => [
                'array', 
                'nullable',
            ],
            'incomes' => [
                'array', 
                'nullable',
            ],
            'incomes.*' => [ 
                'nullable',
                'max:' . config('panel.max_characters_short'),   
            ], 
            'password' => [
                'nullable',
                'min:' . config('panel.password_min_length'),
                'max:' . config('panel.password_max_length'),
            ],
            'custom_disability_type' => [
                'nullable',
                'max:' . config('panel.max_characters_short'),
            ],
            'custom_health_condition' => [
                'nullable',
                'max:' . config('panel.max_characters_short'),
            ],
        ];
    }
}
