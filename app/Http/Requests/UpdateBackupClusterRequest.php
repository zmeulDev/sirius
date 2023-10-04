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
                'unique:backup_clusters,bck_clus_name,' . request()->route('backup_cluster')->id,
            ],
        ];
    }
}
