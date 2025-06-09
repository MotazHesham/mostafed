<?php

namespace App\Http\Requests\Tenant\Admin;

use App\Models\RequiredDocument;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRequiredDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('required_document_edit');
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
