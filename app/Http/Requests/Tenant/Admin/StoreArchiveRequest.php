<?php

namespace App\Http\Requests\Tenant\Admin;

use App\Models\Archive;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreArchiveRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('archive_create');
    }

    public function rules()
    {
        return [
            'archived_at' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'archived_by_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
