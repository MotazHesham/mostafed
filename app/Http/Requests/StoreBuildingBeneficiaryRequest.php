<?php

namespace App\Http\Requests;

use App\Models\BuildingBeneficiary;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBuildingBeneficiaryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('building_beneficiary_create');
    }

    public function rules()
    {
        return [
            'building_id' => [
                'required',
                'integer',
            ],
            'beneficiary_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
