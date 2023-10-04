<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyChecklistRequest;
use App\Http\Requests\StoreChecklistRequest;
use App\Http\Requests\UpdateChecklistRequest;
use App\Models\BackupCluster;
use App\Models\BackupTracker;
use App\Models\Checklist;
use App\Models\Domain;
use App\Models\Farm;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ChecklistController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('checklist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checklists = Checklist::with(['users', 'farm', 'backup_cluster', 'backup_tracker', 'domain'])->get();

        $users = User::get();

        $farms = Farm::get();

        $backup_clusters = BackupCluster::get();

        $backup_trackers = BackupTracker::get();

        $domains = Domain::get();

        return view('admin.checklists.index', compact('backup_clusters', 'backup_trackers', 'checklists', 'domains', 'farms', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('checklist_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id');

        $farms = Farm::pluck('farm_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $backup_clusters = BackupCluster::pluck('bck_clus_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $backup_trackers = BackupTracker::pluck('bck_tracker_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $domains = Domain::pluck('domain_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.checklists.create', compact('backup_clusters', 'backup_trackers', 'domains', 'farms', 'users'));
    }

    public function store(StoreChecklistRequest $request)
    {
        $checklist = Checklist::create($request->all());
        $checklist->users()->sync($request->input('users', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $checklist->id]);
        }

        return redirect()->route('admin.checklists.index');
    }

    public function edit(Checklist $checklist)
    {
        abort_if(Gate::denies('checklist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id');

        $farms = Farm::pluck('farm_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $backup_clusters = BackupCluster::pluck('bck_clus_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $backup_trackers = BackupTracker::pluck('bck_tracker_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $domains = Domain::pluck('domain_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $checklist->load('users', 'farm', 'backup_cluster', 'backup_tracker', 'domain');

        return view('admin.checklists.edit', compact('backup_clusters', 'backup_trackers', 'checklist', 'domains', 'farms', 'users'));
    }

    public function update(UpdateChecklistRequest $request, Checklist $checklist)
    {
        $checklist->update($request->all());
        $checklist->users()->sync($request->input('users', []));

        return redirect()->route('admin.checklists.index');
    }

    public function show(Checklist $checklist)
    {
        abort_if(Gate::denies('checklist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checklist->load('users', 'farm', 'backup_cluster', 'backup_tracker', 'domain', 'checklistMachines', 'checklistChecklistComments');

        return view('admin.checklists.show', compact('checklist'));
    }

    public function destroy(Checklist $checklist)
    {
        abort_if(Gate::denies('checklist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checklist->delete();

        return back();
    }

    public function massDestroy(MassDestroyChecklistRequest $request)
    {
        $checklists = Checklist::find(request('ids'));

        foreach ($checklists as $checklist) {
            $checklist->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('checklist_create') && Gate::denies('checklist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Checklist();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
