@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.machine.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.machines.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="mch_name">{{ trans('cruds.machine.fields.mch_name') }}</label>
                <input class="form-control {{ $errors->has('mch_name') ? 'is-invalid' : '' }}" type="text" name="mch_name" id="mch_name" value="{{ old('mch_name', '') }}" required>
                @if($errors->has('mch_name'))
                    <span class="text-danger">{{ $errors->first('mch_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.machine.fields.mch_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="mch_ip">{{ trans('cruds.machine.fields.mch_ip') }}</label>
                <input class="form-control {{ $errors->has('mch_ip') ? 'is-invalid' : '' }}" type="text" name="mch_ip" id="mch_ip" value="{{ old('mch_ip', '') }}" required>
                @if($errors->has('mch_ip'))
                    <span class="text-danger">{{ $errors->first('mch_ip') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.machine.fields.mch_ip_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.machine.fields.mch_type') }}</label>
                <select class="form-control {{ $errors->has('mch_type') ? 'is-invalid' : '' }}" name="mch_type" id="mch_type" required>
                    <option value disabled {{ old('mch_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Machine::MCH_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('mch_type', 'Select') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('mch_type'))
                    <span class="text-danger">{{ $errors->first('mch_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.machine.fields.mch_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.machine.fields.mch_sql') }}</label>
                <select class="form-control {{ $errors->has('mch_sql') ? 'is-invalid' : '' }}" name="mch_sql" id="mch_sql">
                    <option value disabled {{ old('mch_sql', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Machine::MCH_SQL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('mch_sql', 'Select') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('mch_sql'))
                    <span class="text-danger">{{ $errors->first('mch_sql') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.machine.fields.mch_sql_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.machine.fields.mch_win') }}</label>
                <select class="form-control {{ $errors->has('mch_win') ? 'is-invalid' : '' }}" name="mch_win" id="mch_win">
                    <option value disabled {{ old('mch_win', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Machine::MCH_WIN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('mch_win', 'Select') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('mch_win'))
                    <span class="text-danger">{{ $errors->first('mch_win') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.machine.fields.mch_win_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="system_settings">{{ trans('cruds.machine.fields.system_settings') }}</label>
                <input class="form-control {{ $errors->has('system_settings') ? 'is-invalid' : '' }}" type="text" name="system_settings" id="system_settings" value="{{ old('system_settings', '') }}" required>
                @if($errors->has('system_settings'))
                    <span class="text-danger">{{ $errors->first('system_settings') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.machine.fields.system_settings_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sql_settings">{{ trans('cruds.machine.fields.sql_settings') }}</label>
                <input class="form-control {{ $errors->has('sql_settings') ? 'is-invalid' : '' }}" type="text" name="sql_settings" id="sql_settings" value="{{ old('sql_settings', '') }}" required>
                @if($errors->has('sql_settings'))
                    <span class="text-danger">{{ $errors->first('sql_settings') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.machine.fields.sql_settings_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="other_settings">{{ trans('cruds.machine.fields.other_settings') }}</label>
                <input class="form-control {{ $errors->has('other_settings') ? 'is-invalid' : '' }}" type="text" name="other_settings" id="other_settings" value="{{ old('other_settings', '') }}">
                @if($errors->has('other_settings'))
                    <span class="text-danger">{{ $errors->first('other_settings') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.machine.fields.other_settings_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="checklist_id">{{ trans('cruds.machine.fields.checklist') }}</label>
                <select class="form-control select2 {{ $errors->has('checklist') ? 'is-invalid' : '' }}" name="checklist_id" id="checklist_id" required>
                    @foreach($checklists as $id => $entry)
                        <option value="{{ $id }}" {{ old('checklist_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('checklist'))
                    <span class="text-danger">{{ $errors->first('checklist') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.machine.fields.checklist_helper') }}</span>
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