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
        $step = $this->request->get('step');
        $rules['step'] = [
            'required',
            'in:login_information,basic_information,economic_information,work_information,documents',
        ];
        if($step == 'login_information'){
            $rules['email'] = [
                'required',
                'unique:users,email,' . $this->route('beneficiary')->user->id,
                'email',
                'max:' . config('panel.max_characters_short'),
            ]; 
            $rules['phone'] = [ 
                'required',
                config('panel.phone_validation'),
                'unique:users,phone,' . $this->route('beneficiary')->user->id,
            ];
            $rules['phone_2'] = [
                config('panel.phone_validation'),
                'nullable',
            ]; 
            $rules['identity_num'] = [ 
                'required',
                'unique:users,identity_num,' . $this->route('beneficiary')->user->id,
                config('panel.identity_validation'),
            ];
            $rules['password'] = [
                'nullable',
                'min:' . config('panel.password_min_length'),
                'max:' . config('panel.password_max_length'),
            ];
        }

        if($step == 'basic_information'){
            $rules['name'] = [
                'string',
                'max:' . config('panel.max_characters_short'),
                'required',
            ];
            $rules['dob'] = [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ];
            $rules['address'] = [ 
                'max:' . config('panel.max_characters_long'),
                'nullable',
            ]; 
            $rules['street'] = [
                'string',
                'max:' . config('panel.max_characters_short'),
                'nullable',
            ];
            $rules['building_number'] = [
                'string',
                'max:' . config('panel.max_characters_short'),
                'nullable',
            ];
            $rules['floor_number'] = [
                'string',
                'max:' . config('panel.max_characters_short'),
                'nullable',
            ];
        }

        if($step == 'economic_information'){
            $rules['expenses.*'] = [ 
                'nullable',
                'max:' . config('panel.max_characters_short'),   
            ];
            $rules['expenses'] = [
                'array', 
                'nullable',
            ];
            $rules['incomes'] = [
                'array', 
                'nullable',
            ];
            $rules['incomes.*'] = [ 
                'nullable',
                'max:' . config('panel.max_characters_short'),   
            ]; 
        }

        if($step == 'work_information'){
            $rules['custom_disability_type'] = [
                'nullable',
                'max:' . config('panel.max_characters_short'),
            ];
            $rules['custom_health_condition'] = [
                'nullable',
                'max:' . config('panel.max_characters_short'),
            ]; 
        }
        
        return $rules;
    }
}
