<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBackupClusterRequest;
use App\Http\Requests\StoreBackupClusterRequest;
use App\Http\Requests\UpdateBackupClusterRequest;
use App\Models\BackupCluster;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BackupClusterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('backup_cluster_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $backupClusters = BackupCluster::all();

        return view('admin.backupClusters.index', compact('backupClusters'));
    }

    public function create()
    {
        abort_if(Gate::denies('backup_cluster_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.backupClusters.create');
    }

    public function store(StoreBackupClusterRequest $request)
    {
        $backupCluster = BackupCluster::create($request->all());

        return redirect()->route('admin.backup-clusters.index');
    }

    public function edit(BackupCluster $backupCluster)
    {
        abort_if(Gate::denies('backup_cluster_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.backupClusters.edit', compact('backupCluster'));
    }

    public function update(UpdateBackupClusterRequest $request, BackupCluster $backupCluster)
    {
        $backupCluster->update($request->all());

        return redirect()->route('admin.backup-clusters.index');
    }

    public function show(BackupCluster $backupCluster)
    {
        abort_if(Gate::denies('backup_cluster_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $backupCluster->load('backupClusterChecklists', 'farmBckClusterFarms');

        return view('admin.backupClusters.show', compact('backupCluster'));
    }

    public function destroy(BackupCluster $backupCluster)
    {
        abort_if(Gate::denies('backup_cluster_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $backupCluster->delete();

        return back();
    }

    public function massDestroy(MassDestroyBackupClusterRequest $request)
    {
        $backupClusters = BackupCluster::find(request('ids'));

        foreach ($backupClusters as $backupCluster) {
            $backupCluster->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
