@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.machine.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.machines.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.machine.fields.id') }}
                        </th>
                        <td>
                            {{ $machine->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machine.fields.mch_name') }}
                        </th>
                        <td>
                            {{ $machine->mch_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machine.fields.mch_ip') }}
                        </th>
                        <td>
                            {{ $machine->mch_ip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machine.fields.mch_type') }}
                        </th>
                        <td>
                            {{ App\Models\Machine::MCH_TYPE_SELECT[$machine->mch_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machine.fields.mch_sql') }}
                        </th>
                        <td>
                            {{ App\Models\Machine::MCH_SQL_SELECT[$machine->mch_sql] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machine.fields.mch_win') }}
                        </th>
                        <td>
                            {{ App\Models\Machine::MCH_WIN_SELECT[$machine->mch_win] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machine.fields.system_settings') }}
                        </th>
                        <td>
                            {{ $machine->system_settings }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machine.fields.sql_settings') }}
                        </th>
                        <td>
                            {{ $machine->sql_settings }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machine.fields.other_settings') }}
                        </th>
                        <td>
                            {{ $machine->other_settings }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.machine.fields.checklist') }}
                        </th>
                        <td>
                            {{ $machine->checklist->chk_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.machines.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection