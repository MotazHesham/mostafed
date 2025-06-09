<?php

namespace App\Http\Requests\Tenant\Admin;

use App\Models\BeneficiaryOrder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBeneficiaryOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beneficiary_order_edit');
    }

    public function rules()
    {
        return [
            'beneficiary_id' => [
                'required',
                'integer',
            ],
            'description' => [
                'required',
            ],
            'status_id' => [
                'required',
                'integer',
            ],
            'done' => [
                'required',
            ],
            'specialist_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
