<?php

namespace App\Http\Requests;

use App\Models\BeneficiaryOrderFollowup;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBeneficiaryOrderFollowupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('beneficiary_order_followup_edit');
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
