<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBackupTrackerRequest;
use App\Http\Requests\StoreBackupTrackerRequest;
use App\Http\Requests\UpdateBackupTrackerRequest;
use App\Models\BackupTracker;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BackupTrackerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('backup_tracker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $backupTrackers = BackupTracker::all();

        return view('admin.backupTrackers.index', compact('backupTrackers'));
    }

    public function create()
    {
        abort_if(Gate::denies('backup_tracker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.backupTrackers.create');
    }

    public function store(StoreBackupTrackerRequest $request)
    {
        $backupTracker = BackupTracker::create($request->all());

        return redirect()->route('admin.backup-trackers.index');
    }

    public function edit(BackupTracker $backupTracker)
    {
        abort_if(Gate::denies('backup_tracker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.backupTrackers.edit', compact('backupTracker'));
    }

    public function update(UpdateBackupTrackerRequest $request, BackupTracker $backupTracker)
    {
        $backupTracker->update($request->all());

        return redirect()->route('admin.backup-trackers.index');
    }

    public function show(BackupTracker $backupTracker)
    {
        abort_if(Gate::denies('backup_tracker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $backupTracker->load('backupTrackerChecklists', 'farmBckTrackerFarms');

        return view('admin.backupTrackers.show', compact('backupTracker'));
    }

    public function destroy(BackupTracker $backupTracker)
    {
        abort_if(Gate::denies('backup_tracker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $backupTracker->delete();

        return back();
    }

    public function massDestroy(MassDestroyBackupTrackerRequest $request)
    {
        $backupTrackers = BackupTracker::find(request('ids'));

        foreach ($backupTrackers as $backupTracker) {
            $backupTracker->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
