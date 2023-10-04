<?php

namespace App\Http\Requests;

use App\Models\Domain;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDomainRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('domain_edit');
    }

    public function rules()
    {
        return [
            'domain_name' => [
                'string',
                'required',
                'unique:domains,domain_name,' . request()->route('domain')->id,
            ],
        ];
    }
}
