<?php

namespace App\Http\Requests;

use App\Models\BackupCluster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBackupClusterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('backup_cluster_edit');
    }

    public function rules()
    {
        return [
            'bck_clus_name' => [
                'string',
                'required',
            ],
        ];
    }
}
