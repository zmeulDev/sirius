
<form method="POST" action="{{ route("admin.machines.store") }}" enctype="multipart/form-data">
    @csrf
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-hidden="true" id="createMachine">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ trans('global.add') }} {{ trans('cruds.machine.title_singular') }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="required" for="mch_name">{{ trans('cruds.machine.fields.mch_name') }}</label>
                            <input class="form-control {{ $errors->has('mch_name') ? 'is-invalid' : '' }}" type="text" name="mch_name"
                                id="mch_name" value="{{ old('mch_name', '') }}"
                                placeholder="{{ trans('cruds.machine.fields.mch_name_helper') }}" required>
                            @if($errors->has('mch_name'))
                            <span class="text-danger">{{ $errors->first('mch_name') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label class="required" for="mch_ip">{{ trans('cruds.machine.fields.mch_ip') }}</label>
                            <input class="form-control {{ $errors->has('mch_ip') ? 'is-invalid' : '' }}" type="text" name="mch_ip"
                                id="mch_ip" value="{{ old('mch_ip', '') }}"
                                placeholder="{{ trans('cruds.machine.fields.mch_ip_helper') }}" required>
                            @if($errors->has('mch_ip'))
                            <span class="text-danger">{{ $errors->first('mch_ip') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary" type="button">{{ trans('cruds.machine.fields.mch_type') }}</button>
                                </div>
                                <select class="col-8 default-select {{ $errors->has('mch_type') ? 'is-invalid' : '' }}" name="mch_type"
                                    id="mch_type" required>
                                    <option value disabled {{ old('mch_type', null)===null ? 'selected' : '' }}>
                                        {{ trans('global.pleaseSelect') }}
                                    </option>
                                    @foreach(App\Models\Machine::MCH_TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('mch_type', 'Select' )===(string) $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                    @endforeach
                                </select>
                                @if($errors->has('mch_type'))
                                <span class="text-danger">{{ $errors->first('mch_type') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary" type="button">{{ trans('cruds.machine.fields.mch_sql') }}</button>
                                </div>
                                <select class="col-8 default-select {{ $errors->has('mch_sql') ? 'is-invalid' : '' }}" name="mch_sql"
                                    id="mch_sql">
                                    <option value disabled {{ old('mch_sql', null)===null ? 'selected' : '' }}>
                                        {{ trans('global.pleaseSelect') }}
                                    </option>
                                    @foreach(App\Models\Machine::MCH_SQL_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('mch_sql', 'Select' )===(string) $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                    @endforeach
                                </select>
                                @if($errors->has('mch_sql'))
                                <span class="text-danger">{{ $errors->first('mch_sql') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary" type="button">{{ trans('cruds.machine.fields.mch_win') }}</button>
                                </div>
                                <select class="col-8 default-select {{ $errors->has('mch_win') ? 'is-invalid' : '' }}" name="mch_win"
                                    id="mch_win">
                                    <option value disabled {{ old('mch_win', null)===null ? 'selected' : '' }}>
                                        {{ trans('global.pleaseSelect') }}
                                    </option>
                                    @foreach(App\Models\Machine::MCH_WIN_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('mch_win', 'Select' )===(string) $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                    @endforeach
                                </select>
                                @if($errors->has('mch_win'))
                                <span class="text-danger">{{ $errors->first('mch_win') }}</span>
                                @endif
                            </div>
                        </div>
                        <!-- TODO checklist is not working -->
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary" type="button">{{ trans('cruds.machine.fields.checklist') }}</button>
                                </div>
                                <select class="col-8 default-select  {{ $errors->has('checklist') ? 'is-invalid' : '' }}"
                                    name="checklist_id" id="checklist_id" required>
                                    @foreach($checklists as $id => $entry)
                                    <option value="{{ $id }}" {{ old('checklist_id')==$id ? 'selected' : '' }}>{{ $entry }}
                                    </option>
                                    @endforeach
                                </select>
                                @if($errors->has('checklist'))
                                <span class="text-danger">{{ $errors->first('checklist') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="required" for="system_settings">{{ trans('cruds.machine.fields.system_settings') }}</label>
                            <input class="form-control {{ $errors->has('system_settings') ? 'is-invalid' : '' }}" type="text"
                                name="system_settings" id="system_settings" value="{{ old('system_settings', '') }}"
                                placeholder="{{ trans('cruds.machine.fields.system_settings_helper') }}" required>
                            @if($errors->has('system_settings'))
                            <span class="text-danger">{{ $errors->first('system_settings') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label class="required" for="sql_settings">{{ trans('cruds.machine.fields.sql_settings') }}</label>
                            <input class="form-control {{ $errors->has('sql_settings') ? 'is-invalid' : '' }}" type="text"
                                name="sql_settings" id="sql_settings" value="{{ old('sql_settings', '') }}"
                                placeholder="{{ trans('cruds.machine.fields.sql_settings_helper') }}" required>
                            @if($errors->has('sql_settings'))
                            <span class="text-danger">{{ $errors->first('sql_settings') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="other_settings">{{ trans('cruds.machine.fields.other_settings') }}</label>
                            <input class="form-control {{ $errors->has('other_settings') ? 'is-invalid' : '' }}" type="text"
                                name="other_settings" id="other_settings" value="{{ old('other_settings', '') }}"
                                placeholder="{{ trans('cruds.machine.fields.other_settings_helper') }}">
                            @if($errors->has('other_settings'))
                            <span class="text-danger">{{ $errors->first('other_settings') }}</span>
                            @endif
                
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{ trans('global.save') }}</button>
                </div>
                
               
            </div>
            
        </div>
    </div>
</div>
</form>