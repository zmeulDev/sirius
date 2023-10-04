<?php

namespace App\Http\Requests;

use App\Models\BackupTracker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBackupTrackerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('backup_tracker_create');
    }

    public function rules()
    {
        return [
            'bck_tracker_name' => [
                'string',
                'required',
                'unique:backup_trackers',
            ],
        ];
    }
}
