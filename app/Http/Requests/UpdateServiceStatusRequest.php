<?php

namespace App\Http\Requests;

use App\Models\ServiceStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateServiceStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_status_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:255',
                'required',
            ],
            'badge_class' => [
                'required',
            ],
            'ordering' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
