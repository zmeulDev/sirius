@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.maintenance.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.maintenances.update", [$maintenance->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="stlr_caseid">{{ trans('cruds.maintenance.fields.stlr_caseid') }}</label>
                <input class="form-control {{ $errors->has('stlr_caseid') ? 'is-invalid' : '' }}" type="number" name="stlr_caseid" id="stlr_caseid" value="{{ old('stlr_caseid', $maintenance->stlr_caseid) }}" step="1">
                @if($errors->has('stlr_caseid'))
                    <span class="text-danger">{{ $errors->first('stlr_caseid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.maintenance.fields.stlr_caseid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stlr_machineid">{{ trans('cruds.maintenance.fields.stlr_machineid') }}</label>
                <input class="form-control {{ $errors->has('stlr_machineid') ? 'is-invalid' : '' }}" type="text" name="stlr_machineid" id="stlr_machineid" value="{{ old('stlr_machineid', $maintenance->stlr_machineid) }}">
                @if($errors->has('stlr_machineid'))
                    <span class="text-danger">{{ $errors->first('stlr_machineid') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.maintenance.fields.stlr_machineid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stlr_machine">{{ trans('cruds.maintenance.fields.stlr_machine') }}</label>
                <input class="form-control {{ $errors->has('stlr_machine') ? 'is-invalid' : '' }}" type="text" name="stlr_machine" id="stlr_machine" value="{{ old('stlr_machine', $maintenance->stlr_machine) }}">
                @if($errors->has('stlr_machine'))
                    <span class="text-danger">{{ $errors->first('stlr_machine') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.maintenance.fields.stlr_machine_helper') }}</span>
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