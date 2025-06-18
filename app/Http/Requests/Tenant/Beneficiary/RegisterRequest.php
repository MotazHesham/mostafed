<?php

namespace App\Http\Requests\Tenant\Beneficiary;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
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
                'unique:users',
                'email',
                'max:' . config('panel.max_characters_short'),
            ], 
            'phone' => [ 
                'required',
                config('panel.phone_validation'),
                'unique:users',
            ], 
            'password' => [
                'required',
                'min:' . config('panel.password_min_length'),
                'max:' . config('panel.password_max_length'),
            ], 
            'identity_num' => [ 
                'required',
                'unique:users',
                config('panel.identity_validation'),
            ],
        ];
    }
}
