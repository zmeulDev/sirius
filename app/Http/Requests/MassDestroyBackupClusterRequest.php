<?php

namespace App\Http\Requests;

use App\Models\BackupCluster;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyBackupClusterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('backup_cluster_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:backup_clusters,id',
        ];
    }
}
