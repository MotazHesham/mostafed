<?php

namespace App\Http\Requests;

use App\Models\EconomicStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEconomicStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('economic_status_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:255',
                'required',
            ],
            'type' => [
                'required',
            ],
        ];
    }
}
