<?php

namespace App\Http\Requests;

use App\Models\Farm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFarmRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('farm_edit');
    }

    public function rules()
    {
        return [
            'farm_name' => [
                'string',
                'required',
            ],
            'farm_datacenters.*' => [
                'integer',
            ],
            'farm_datacenters' => [
                'required',
                'array',
            ],
            'farm_prefix' => [
                'string',
                'required',
            ],
            'farm_domains.*' => [
                'integer',
            ],
            'farm_domains' => [
                'required',
                'array',
            ],
            'farm_bck_trackers.*' => [
                'integer',
            ],
            'farm_bck_trackers' => [
                'required',
                'array',
            ],
            'farm_bck_clusters.*' => [
                'integer',
            ],
            'farm_bck_clusters' => [
                'required',
                'array',
            ],
        ];
    }
}
