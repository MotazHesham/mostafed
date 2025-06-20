<?php

namespace App\Http\Requests\Tenant\Admin;

use App\Models\TaskTag;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTaskTagRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_tag_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'badge_class' => [
                'required',
            ],
        ];
    }
}
