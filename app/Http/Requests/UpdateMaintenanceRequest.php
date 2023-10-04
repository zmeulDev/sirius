<?php

namespace App\Http\Requests;

use App\Models\Maintenance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMaintenanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('maintenance_edit');
    }

    public function rules()
    {
        return [
            'stlr_caseid' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'stlr_machineid' => [
                'string',
                'nullable',
            ],
            'stlr_machine' => [
                'string',
                'nullable',
            ],
        ];
    }
}
