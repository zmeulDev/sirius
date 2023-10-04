@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.datacenter.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.datacenters.update", [$datacenter->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="datacenter_name">{{ trans('cruds.datacenter.fields.datacenter_name') }}</label>
                <input class="form-control {{ $errors->has('datacenter_name') ? 'is-invalid' : '' }}" type="text" name="datacenter_name" id="datacenter_name" value="{{ old('datacenter_name', $datacenter->datacenter_name) }}" required>
                @if($errors->has('datacenter_name'))
                    <span class="text-danger">{{ $errors->first('datacenter_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.datacenter.fields.datacenter_name_helper') }}</span>
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