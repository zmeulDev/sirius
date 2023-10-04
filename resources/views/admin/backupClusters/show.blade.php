@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.backupCluster.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.backup-clusters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.backupCluster.fields.id') }}
                        </th>
                        <td>
                            {{ $backupCluster->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.backupCluster.fields.bck_clus_name') }}
                        </th>
                        <td>
                            {{ $backupCluster->bck_clus_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.backupCluster.fields.bck_clus_type') }}
                        </th>
                        <td>
                            {{ App\Models\BackupCluster::BCK_CLUS_TYPE_SELECT[$backupCluster->bck_clus_type] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.backup-clusters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#backup_cluster_checklists" role="tab" data-toggle="tab">
                {{ trans('cruds.checklist.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#farm_bck_cluster_farms" role="tab" data-toggle="tab">
                {{ trans('cruds.farm.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="backup_cluster_checklists">
            @includeIf('admin.backupClusters.relationships.backupClusterChecklists', ['checklists' => $backupCluster->backupClusterChecklists])
        </div>
        <div class="tab-pane" role="tabpanel" id="farm_bck_cluster_farms">
            @includeIf('admin.backupClusters.relationships.farmBckClusterFarms', ['farms' => $backupCluster->farmBckClusterFarms])
        </div>
    </div>
</div>

@endsection