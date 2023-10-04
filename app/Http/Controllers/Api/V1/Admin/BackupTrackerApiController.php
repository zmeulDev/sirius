<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBackupTrackerRequest;
use App\Http\Requests\UpdateBackupTrackerRequest;
use App\Http\Resources\Admin\BackupTrackerResource;
use App\Models\BackupTracker;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BackupTrackerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('backup_tracker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BackupTrackerResource(BackupTracker::all());
    }

    public function store(StoreBackupTrackerRequest $request)
    {
        $backupTracker = BackupTracker::create($request->all());

        return (new BackupTrackerResource($backupTracker))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BackupTracker $backupTracker)
    {
        abort_if(Gate::denies('backup_tracker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BackupTrackerResource($backupTracker);
    }

    public function update(UpdateBackupTrackerRequest $request, BackupTracker $backupTracker)
    {
        $backupTracker->update($request->all());

        return (new BackupTrackerResource($backupTracker))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BackupTracker $backupTracker)
    {
        abort_if(Gate::denies('backup_tracker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $backupTracker->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
