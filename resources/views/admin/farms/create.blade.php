@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.farm.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.farms.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="farm_name">{{ trans('cruds.farm.fields.farm_name') }}</label>
                <input class="form-control {{ $errors->has('farm_name') ? 'is-invalid' : '' }}" type="text" name="farm_name" id="farm_name" value="{{ old('farm_name', '') }}" required>
                @if($errors->has('farm_name'))
                    <span class="text-danger">{{ $errors->first('farm_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.farm.fields.farm_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="farm_prefix">{{ trans('cruds.farm.fields.farm_prefix') }}</label>
                <input class="form-control {{ $errors->has('farm_prefix') ? 'is-invalid' : '' }}" type="text" name="farm_prefix" id="farm_prefix" value="{{ old('farm_prefix', '') }}" required>
                @if($errors->has('farm_prefix'))
                    <span class="text-danger">{{ $errors->first('farm_prefix') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.farm.fields.farm_prefix_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="farm_datacenters">{{ trans('cruds.farm.fields.farm_datacenter') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('farm_datacenters') ? 'is-invalid' : '' }}" name="farm_datacenters[]" id="farm_datacenters" multiple required>
                    @foreach($farm_datacenters as $id => $farm_datacenter)
                        <option value="{{ $id }}" {{ in_array($id, old('farm_datacenters', [])) ? 'selected' : '' }}>{{ $farm_datacenter }}</option>
                    @endforeach
                </select>
                @if($errors->has('farm_datacenters'))
                    <span class="text-danger">{{ $errors->first('farm_datacenters') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.farm.fields.farm_datacenter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="farm_domains">{{ trans('cruds.farm.fields.farm_domain') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('farm_domains') ? 'is-invalid' : '' }}" name="farm_domains[]" id="farm_domains" multiple>
                    @foreach($farm_domains as $id => $farm_domain)
                        <option value="{{ $id }}" {{ in_array($id, old('farm_domains', [])) ? 'selected' : '' }}>{{ $farm_domain }}</option>
                    @endforeach
                </select>
                @if($errors->has('farm_domains'))
                    <span class="text-danger">{{ $errors->first('farm_domains') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.farm.fields.farm_domain_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="farm_bck_trackers">{{ trans('cruds.farm.fields.farm_bck_tracker') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('farm_bck_trackers') ? 'is-invalid' : '' }}" name="farm_bck_trackers[]" id="farm_bck_trackers" multiple required>
                    @foreach($farm_bck_trackers as $id => $farm_bck_tracker)
                        <option value="{{ $id }}" {{ in_array($id, old('farm_bck_trackers', [])) ? 'selected' : '' }}>{{ $farm_bck_tracker }}</option>
                    @endforeach
                </select>
                @if($errors->has('farm_bck_trackers'))
                    <span class="text-danger">{{ $errors->first('farm_bck_trackers') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.farm.fields.farm_bck_tracker_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="farm_bck_clusters">{{ trans('cruds.farm.fields.farm_bck_cluster') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('farm_bck_clusters') ? 'is-invalid' : '' }}" name="farm_bck_clusters[]" id="farm_bck_clusters" multiple required>
                    @foreach($farm_bck_clusters as $id => $farm_bck_cluster)
                        <option value="{{ $id }}" {{ in_array($id, old('farm_bck_clusters', [])) ? 'selected' : '' }}>{{ $farm_bck_cluster }}</option>
                    @endforeach
                </select>
                @if($errors->has('farm_bck_clusters'))
                    <span class="text-danger">{{ $errors->first('farm_bck_clusters') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.farm.fields.farm_bck_cluster_helper') }}</span>
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