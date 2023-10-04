<?php

namespace App\Http\Requests;

use App\Models\Datacenter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDatacenterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('datacenter_edit');
    }

    public function rules()
    {
        return [
            'datacenter_name' => [
                'string',
                'required',
            ],
        ];
    }
}
