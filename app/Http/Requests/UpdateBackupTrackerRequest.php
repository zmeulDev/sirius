<?php

namespace App\Http\Requests;

use App\Models\BackupTracker;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBackupTrackerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('backup_tracker_edit');
    }

    public function rules()
    {
        return [
            'bck_tracker_name' => [
                'string',
                'required',
                'unique:backup_trackers,bck_tracker_name,' . request()->route('backup_tracker')->id,
            ],
        ];
    }
}
