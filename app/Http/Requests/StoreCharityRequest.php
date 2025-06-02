<?php

namespace App\Http\Requests;

use App\Models\Charity;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCharityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('charity_create');
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
