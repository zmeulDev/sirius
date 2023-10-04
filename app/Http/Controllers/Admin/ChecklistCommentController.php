<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyChecklistCommentRequest;
use App\Http\Requests\StoreChecklistCommentRequest;
use App\Http\Requests\UpdateChecklistCommentRequest;
use App\Models\Checklist;
use App\Models\ChecklistComment;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ChecklistCommentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('checklist_comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checklistComments = ChecklistComment::with(['user', 'checklist'])->get();

        $users = User::get();

        $checklists = Checklist::get();

        return view('admin.checklistComments.index', compact('checklistComments', 'checklists', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('checklist_comment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $checklists = Checklist::pluck('chk_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.checklistComments.create', compact('checklists', 'users'));
    }

    public function store(StoreChecklistCommentRequest $request)
    {
        $checklistComment = ChecklistComment::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $checklistComment->id]);
        }

        return redirect()->route('admin.checklist-comments.index');
    }

    public function edit(ChecklistComment $checklistComment)
    {
        abort_if(Gate::denies('checklist_comment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $checklists = Checklist::pluck('chk_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $checklistComment->load('user', 'checklist');

        return view('admin.checklistComments.edit', compact('checklistComment', 'checklists', 'users'));
    }

    public function update(UpdateChecklistCommentRequest $request, ChecklistComment $checklistComment)
    {
        $checklistComment->update($request->all());

        return redirect()->route('admin.checklist-comments.index');
    }

    public function show(ChecklistComment $checklistComment)
    {
        abort_if(Gate::denies('checklist_comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checklistComment->load('user', 'checklist');

        return view('admin.checklistComments.show', compact('checklistComment'));
    }

    public function destroy(ChecklistComment $checklistComment)
    {
        abort_if(Gate::denies('checklist_comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checklistComment->delete();

        return back();
    }

    public function massDestroy(MassDestroyChecklistCommentRequest $request)
    {
        $checklistComments = ChecklistComment::find(request('ids'));

        foreach ($checklistComments as $checklistComment) {
            $checklistComment->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('checklist_comment_create') && Gate::denies('checklist_comment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ChecklistComment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
