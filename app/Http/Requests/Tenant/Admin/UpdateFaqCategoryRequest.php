<?php

namespace App\Http\Requests\Tenant\Admin;

use App\Models\FaqCategory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFaqCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('faq_category_edit');
    }

    public function rules()
    {
        return [
            'category' => [
                'string',
                'required',
            ],
        ];
    }
}
