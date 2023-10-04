<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreChecklistCommentRequest;
use App\Http\Requests\UpdateChecklistCommentRequest;
use App\Http\Resources\Admin\ChecklistCommentResource;
use App\Models\ChecklistComment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChecklistCommentApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('checklist_comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ChecklistCommentResource(ChecklistComment::with(['user', 'checklist'])->get());
    }

    public function store(StoreChecklistCommentRequest $request)
    {
        $checklistComment = ChecklistComment::create($request->all());

        return (new ChecklistCommentResource($checklistComment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ChecklistComment $checklistComment)
    {
        abort_if(Gate::denies('checklist_comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ChecklistCommentResource($checklistComment->load(['user', 'checklist']));
    }

    public function update(UpdateChecklistCommentRequest $request, ChecklistComment $checklistComment)
    {
        $checklistComment->update($request->all());

        return (new ChecklistCommentResource($checklistComment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ChecklistComment $checklistComment)
    {
        abort_if(Gate::denies('checklist_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checklistComment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
