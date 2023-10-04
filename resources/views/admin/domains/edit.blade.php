@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.domain.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.domains.update", [$domain->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="farm_name">{{ trans('cruds.domain.fields.farm_name') }}</label>
                <input class="form-control {{ $errors->has('farm_name') ? 'is-invalid' : '' }}" type="text" name="farm_name" id="farm_name" value="{{ old('farm_name', $domain->farm_name) }}" required>
                @if($errors->has('farm_name'))
                    <span class="text-danger">{{ $errors->first('farm_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.domain.fields.farm_name_helper') }}</span>
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