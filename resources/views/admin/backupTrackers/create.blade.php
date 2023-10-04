@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.backupTracker.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.backup-trackers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="bck_tracker_name">{{ trans('cruds.backupTracker.fields.bck_tracker_name') }}</label>
                <input class="form-control {{ $errors->has('bck_tracker_name') ? 'is-invalid' : '' }}" type="text" name="bck_tracker_name" id="bck_tracker_name" value="{{ old('bck_tracker_name', '') }}" required>
                @if($errors->has('bck_tracker_name'))
                    <span class="text-danger">{{ $errors->first('bck_tracker_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.backupTracker.fields.bck_tracker_name_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection