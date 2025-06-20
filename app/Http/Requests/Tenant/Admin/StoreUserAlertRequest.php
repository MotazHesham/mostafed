<?php

namespace App\Http\Requests\Tenant\Admin;

use App\Models\UserAlert;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserAlertRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_alert_create');
    }

    public function rules()
    {
        return [
            'alert_text' => [
                'string',
                'required',
            ],
            'alert_link' => [
                'string',
                'nullable',
            ],
            'users.*' => [
                'integer',
            ],
            'users' => [
                'array',
            ],
            'user_type' => [
                'required',
            ],
        ];
    }
}
