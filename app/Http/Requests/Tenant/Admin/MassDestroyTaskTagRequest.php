<?php

namespace App\Http\Requests\Tenant\Admin;

use App\Models\TaskTag;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTaskTagRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('task_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:task_tags,id',
        ];
    }
}
