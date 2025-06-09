<?php

namespace App\Http\Requests\Central;

use App\Models\FrontAchievement;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFrontAchievementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('front_achievement_create');
    }

    public function rules()
    {
        return [
            'icon' => [
                'string',
                'required',
            ],
            'icon_color' => [
                'string',
                'required',
            ],
            'title' => [
                'string',
                'max:255',
                'required',
            ],
            'achievement' => [
                'string',
                'required',
            ],
        ];
    }
}
