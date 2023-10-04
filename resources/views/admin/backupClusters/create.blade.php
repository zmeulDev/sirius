@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.backupCluster.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.backup-clusters.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="bck_clus_name">{{ trans('cruds.backupCluster.fields.bck_clus_name') }}</label>
                <input class="form-control {{ $errors->has('bck_clus_name') ? 'is-invalid' : '' }}" type="text" name="bck_clus_name" id="bck_clus_name" value="{{ old('bck_clus_name', '') }}" required>
                @if($errors->has('bck_clus_name'))
                    <span class="text-danger">{{ $errors->first('bck_clus_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.backupCluster.fields.bck_clus_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.backupCluster.fields.bck_clus_type') }}</label>
                <select class="form-control {{ $errors->has('bck_clus_type') ? 'is-invalid' : '' }}" name="bck_clus_type" id="bck_clus_type">
                    <option value disabled {{ old('bck_clus_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\BackupCluster::BCK_CLUS_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('bck_clus_type', 'Select') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('bck_clus_type'))
                    <span class="text-danger">{{ $errors->first('bck_clus_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.backupCluster.fields.bck_clus_type_helper') }}</span>
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