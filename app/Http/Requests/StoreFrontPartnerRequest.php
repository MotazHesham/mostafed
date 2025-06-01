<?php

namespace App\Http\Requests;

use App\Models\FrontPartner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFrontPartnerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('front_partner_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'image' => [
                'required',
            ],
        ];
    }
}
