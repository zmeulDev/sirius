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
            'farm_name' => [
                'string',
                'required',
                'unique:domains,farm_name,' . request()->route('domain')->id,
            ],
        ];
    }
}
