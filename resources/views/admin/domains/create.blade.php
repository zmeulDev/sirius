@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.domain.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.domains.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="domain_name">{{ trans('cruds.domain.fields.domain_name') }}</label>
                <input class="form-control {{ $errors->has('domain_name') ? 'is-invalid' : '' }}" type="text" name="domain_name" id="domain_name" value="{{ old('domain_name', '') }}" required>
                @if($errors->has('domain_name'))
                    <span class="text-danger">{{ $errors->first('domain_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.domain.fields.domain_name_helper') }}</span>
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