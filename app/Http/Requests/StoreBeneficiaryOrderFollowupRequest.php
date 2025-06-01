<?php

namespace App\Http\Requests;

use App\Models\BeneficiaryOrderFollowup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBeneficiaryOrderFollowupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beneficiary_order_followup_create');
    }

    public function rules()
    {
        return [
            'beneficiary_followup_id' => [
                'required',
                'integer',
            ],
            'comment' => [
                'required',
            ],
            'attachments' => [
                'array',
            ],
        ];
    }
}
