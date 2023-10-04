<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBackupClusterRequest;
use App\Http\Requests\UpdateBackupClusterRequest;
use App\Http\Resources\Admin\BackupClusterResource;
use App\Models\BackupCluster;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BackupClusterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('backup_cluster_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BackupClusterResource(BackupCluster::all());
    }

    public function store(StoreBackupClusterRequest $request)
    {
        $backupCluster = BackupCluster::create($request->all());

        return (new BackupClusterResource($backupCluster))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BackupCluster $backupCluster)
    {
        abort_if(Gate::denies('backup_cluster_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BackupClusterResource($backupCluster);
    }

    public function update(UpdateBackupClusterRequest $request, BackupCluster $backupCluster)
    {
        $backupCluster->update($request->all());

        return (new BackupClusterResource($backupCluster))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BackupCluster $backupCluster)
    {
        abort_if(Gate::denies('backup_cluster_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $backupCluster->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
