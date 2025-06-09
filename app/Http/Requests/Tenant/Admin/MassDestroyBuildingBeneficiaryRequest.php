<?php

namespace App\Http\Requests\Tenant\Admin;

use App\Models\BuildingBeneficiary;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBuildingBeneficiaryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('building_beneficiary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:building_beneficiaries,id',
        ];
    }
}
