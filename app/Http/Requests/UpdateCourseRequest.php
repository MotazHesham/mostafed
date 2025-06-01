<?php

namespace App\Http\Requests;

use App\Models\Course;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCourseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'short_description' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'attend_type' => [
                'required',
            ],
            'certificate' => [
                'required',
            ],
            'trainer' => [
                'string',
                'required',
            ],
            'start_at' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_at' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
