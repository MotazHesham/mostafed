<?php

namespace App\Http\Requests\Central;

use App\Models\Charity;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCharityRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('charity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:charities,id',
        ];
    }
}
