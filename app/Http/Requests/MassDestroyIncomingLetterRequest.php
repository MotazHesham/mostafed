<?php

namespace App\Http\Requests;

use App\Models\IncomingLetter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyIncomingLetterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('incoming_letter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:incoming_letters,id',
        ];
    }
}
