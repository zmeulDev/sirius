<?php

namespace App\Http\Requests;

use App\Models\Datacenter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDatacenterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('datacenter_create');
    }

    public function rules()
    {
        return [
            'datacenter_name' => [
                'string',
                'required',
                'unique:datacenters',
            ],
        ];
    }
}
