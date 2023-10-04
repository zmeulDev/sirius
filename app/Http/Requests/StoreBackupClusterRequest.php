<?php

namespace App\Http\Requests;

use App\Models\BackupCluster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBackupClusterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('backup_cluster_create');
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
