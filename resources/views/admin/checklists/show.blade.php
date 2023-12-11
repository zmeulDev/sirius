@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.checklist.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.checklists.index') }}">
                    {{ trans('global.back_to_list') }} | Checklist show
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.checklist.fields.chk_name') }}
                        </th>
                        <td>
                            {{ $checklist->chk_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checklist.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Checklist::TYPE_SELECT[$checklist->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checklist.fields.users') }}
                        </th>
                        <td>
                            @foreach($checklist->users as $key => $users)
                                <span class="label label-info">{{ $users->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checklist.fields.farm') }}
                        </th>
                        <td>
                            {{ $checklist->farm->farm_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checklist.fields.backup_cluster') }}
                        </th>
                        <td>
                            {{ $checklist->backup_cluster->bck_clus_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checklist.fields.backup_tracker') }}
                        </th>
                        <td>
                            {{ $checklist->backup_tracker->bck_tracker_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checklist.fields.domain') }}
                        </th>
                        <td>
                            {{ $checklist->domain->domain_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checklist.fields.domain_user') }}
                        </th>
                        <td>
                            {{ $checklist->domain_user }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checklist.fields.stlr_cases') }}
                        </th>
                        <td>
                            {{ $checklist->stlr_cases }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checklist.fields.details') }}
                        </th>
                        <td>
                            {{ $checklist->details }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checklist.fields.checks') }}
                        </th>
                        <td>
                            {{ $checklist->checks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checklist.fields.notes') }}
                        </th>
                        <td>
                            {!! $checklist->notes !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.checklists.index') }}">
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

    <div class="card-body">
        <div class="profile-tab">
            <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                <li class="nav-item" role="presentation">
                    <a href="#checklist_machines" data-bs-toggle="tab" class="nav-link show active" aria-selected="true" role="tab">
                        {{ trans('cruds.machine.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#checklist_checklist_comments" role="tab" data-bs-toggle="tab">
                        {{ trans('cruds.checklistComment.title') }}
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-panel" role="tabpanel" id="checklist_machines">
                    @includeIf('admin.checklists.relationships.checklistMachines', ['machines' => $checklist->checklistMachines])
                </div>
                <div class="tab-pane" role="tabpanel" id="checklist_checklist_comments">
                    @includeIf('admin.checklists.relationships.checklistChecklistComments', ['checklistComments' =>
                    $checklist->checklistChecklistComments])
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection