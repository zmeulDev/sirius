<?php

namespace App\Http\Requests;

use App\Models\Checklist;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateChecklistRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('checklist_edit');
    }

    public function rules()
    {
        return [
            'chk_name' => [
                'string',
                'required',
            ],
            'type' => [
                'required',
            ],
            'users.*' => [
                'integer',
            ],
            'users' => [
                'required',
                'array',
            ],
            'farm_id' => [
                'required',
                'integer',
            ],
            'domain_id' => [
                'required',
                'integer',
            ],
            'domain_user' => [
                'string',
                'required',
            ],
            'stlr_cases' => [
                'string',
                'required',
            ],
            'details' => [
                'string',
                'required',
            ],
            'checks' => [
                'string',
                'required',
            ],
        ];
    }
}
