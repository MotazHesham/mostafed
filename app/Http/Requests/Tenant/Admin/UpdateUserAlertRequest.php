<?php

namespace App\Http\Requests\Tenant\Admin;

use App\Models\UserAlert;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserAlertRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_alert_edit');
    }

    public function rules()
    {
        return [
            'user_type' => [
                'required',
            ],
        ];
    }
}
