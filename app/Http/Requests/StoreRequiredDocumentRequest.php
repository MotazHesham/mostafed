<?php

namespace App\Http\Requests;

use App\Models\RequiredDocument;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRequiredDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('required_document_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
