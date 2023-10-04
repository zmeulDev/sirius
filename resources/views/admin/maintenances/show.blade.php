@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.maintenance.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.maintenances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.maintenance.fields.id') }}
                        </th>
                        <td>
                            {{ $maintenance->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.maintenance.fields.stlr_caseid') }}
                        </th>
                        <td>
                            {{ $maintenance->stlr_caseid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.maintenance.fields.stlr_machineid') }}
                        </th>
                        <td>
                            {{ $maintenance->stlr_machineid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.maintenance.fields.stlr_machine') }}
                        </th>
                        <td>
                            {{ $maintenance->stlr_machine }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.maintenances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection