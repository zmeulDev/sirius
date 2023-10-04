@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.checklistComment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.checklist-comments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.checklistComment.fields.id') }}
                        </th>
                        <td>
                            {{ $checklistComment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checklistComment.fields.user') }}
                        </th>
                        <td>
                            {{ $checklistComment->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checklistComment.fields.checklist') }}
                        </th>
                        <td>
                            {{ $checklistComment->checklist->chk_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checklistComment.fields.comment') }}
                        </th>
                        <td>
                            {!! $checklistComment->comment !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.checklist-comments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection