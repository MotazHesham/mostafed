<?php

namespace App\Http\Requests\Tenant\Admin;

use App\Models\IncomingLetter;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreIncomingLetterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('incoming_letter_create');
    }

    public function rules()
    {
        return [
            'letter_number' => [
                'string',
                'nullable',
            ],
            'external_number' => [
                'string',
                'nullable',
            ],
            'letter_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'received_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'recevier_id' => [
                'required',
                'integer',
            ],
            'subject' => [
                'string',
                'max:500',
                'required',
            ],
            'letter' => [
                'required',
            ],
            'priority' => [
                'required',
            ],
            'incoming_type' => [
                'required',
            ],
            'attachments' => [
                'array',
            ],
        ];
    }
}
