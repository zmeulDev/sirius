<?php

namespace App\Http\Requests;

use App\Models\Machine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMachineRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('machine_edit');
    }

    public function rules()
    {
        return [
            'mch_name' => [
                'string',
                'required',
                'unique:machines,mch_name,' . request()->route('machine')->id,
            ],
            'mch_ip' => [
                'string',
                'required',
                'unique:machines,mch_ip,' . request()->route('machine')->id,
            ],
            'mch_type' => [
                'required',
            ],
            'system_settings' => [
                'string',
                'required',
            ],
            'sql_settings' => [
                'string',
                'required',
            ],
            'other_settings' => [
                'string',
                'nullable',
            ],
            'checklist_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
