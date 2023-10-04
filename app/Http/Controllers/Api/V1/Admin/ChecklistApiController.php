<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreChecklistRequest;
use App\Http\Requests\UpdateChecklistRequest;
use App\Http\Resources\Admin\ChecklistResource;
use App\Models\Checklist;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChecklistApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('checklist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ChecklistResource(Checklist::with(['users', 'farm', 'backup_cluster', 'backup_tracker', 'domain'])->get());
    }

    public function store(StoreChecklistRequest $request)
    {
        $checklist = Checklist::create($request->all());
        $checklist->users()->sync($request->input('users', []));

        return (new ChecklistResource($checklist))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Checklist $checklist)
    {
        abort_if(Gate::denies('checklist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ChecklistResource($checklist->load(['users', 'farm', 'backup_cluster', 'backup_tracker', 'domain']));
    }

    public function update(UpdateChecklistRequest $request, Checklist $checklist)
    {
        $checklist->update($request->all());
        $checklist->users()->sync($request->input('users', []));

        return (new ChecklistResource($checklist))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Checklist $checklist)
    {
        abort_if(Gate::denies('checklist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checklist->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
