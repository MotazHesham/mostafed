<?php

namespace App\Http\Requests;

use App\Models\UserQuery;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserQueryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_query_create');
    }

    public function rules()
    {
        return [
            'question' => [
                'required',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
