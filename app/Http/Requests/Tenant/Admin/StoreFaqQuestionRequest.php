<?php

namespace App\Http\Requests\Tenant\Admin;

use App\Models\FaqQuestion;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFaqQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('faq_question_create');
    }

    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'integer',
            ],
            'question' => [
                'required',
            ],
            'answer' => [
                'required',
            ],
        ];
    }
}
