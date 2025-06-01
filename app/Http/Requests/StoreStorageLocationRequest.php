<?php

namespace App\Http\Requests;

use App\Models\StorageLocation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStorageLocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('storage_location_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'max:255',
                'required',
                'unique:storage_locations',
            ],
            'name' => [
                'string',
                'max:255',
                'required',
            ],
        ];
    }
}
