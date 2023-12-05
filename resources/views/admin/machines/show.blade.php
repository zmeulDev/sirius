@extends('layouts.admin')
@section('content')

<div class="col-xl-4 col-lg-12 col-sm-12">
    <div class="card">
        <div class="card-header border-0 pb-0">
            <h2 class="card-title">{{ $machine->mch_name }}</h2>
        </div>
        <div class="card-body pb-0">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex px-0 justify-content-between">
                    <strong>IP</strong>
                    <span class="mb-0">{{ $machine->mch_ip }}</span>
                </li>
                <li class="list-group-item d-flex px-0 justify-content-between">
                    <strong>SQL</strong>
                    <span class="mb-0">{{ $machine->mch_sql }}</span>
                </li>
                <li class="list-group-item d-flex px-0 justify-content-between">
                    <strong>OS</strong>
                    <span class="mb-0">{{ $machine->mch_win }}</span>
                </li>
                <li class="list-group-item d-flex px-0 justify-content-between">
                    <strong>Type</strong>
                    <span class="mb-0">{{ $machine->mch_type }}</span>
                </li>
            </ul>
        </div>
        <div class="card-footer pt-0 pb-0 text-center">
            <div class="row">
                <div class="col-4 pt-3 pb-3 border-end">
                    <h3 class="mb-1 text-primary">150</h3>
                    <span>Projects</span>
                </div>
                <div class="col-4 pt-3 pb-3 border-end">
                    <h3 class="mb-1 text-primary">140</h3>
                    <span>Uploads</span>
                </div>
                <div class="col-4 pt-3 pb-3">
                    <h3 class="mb-1 text-primary">45</h3>
                    <span>Tasks</span>
                </div>
            </div>
        </div>
    </div>
</div>

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