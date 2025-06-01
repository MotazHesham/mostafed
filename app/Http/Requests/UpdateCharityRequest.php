<?php

namespace App\Http\Requests;

use App\Models\Charity;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCharityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('charity_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:255',
                'required',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'domain' => [
                'string',
                'nullable',
            ],
        ];
    }
}
