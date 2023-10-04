@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.farm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.farms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.farm.fields.id') }}
                        </th>
                        <td>
                            {{ $farm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.farm.fields.farm_name') }}
                        </th>
                        <td>
                            {{ $farm->farm_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.farm.fields.farm_datacenter') }}
                        </th>
                        <td>
                            @foreach($farm->farm_datacenters as $key => $farm_datacenter)
                                <span class="label label-info">{{ $farm_datacenter->datacenter_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.farm.fields.farm_prefix') }}
                        </th>
                        <td>
                            {{ $farm->farm_prefix }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.farm.fields.farm_domain') }}
                        </th>
                        <td>
                            @foreach($farm->farm_domains as $key => $farm_domain)
                                <span class="label label-info">{{ $farm_domain->farm_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.farm.fields.farm_bck_tracker') }}
                        </th>
                        <td>
                            @foreach($farm->farm_bck_trackers as $key => $farm_bck_tracker)
                                <span class="label label-info">{{ $farm_bck_tracker->bck_tracker_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.farm.fields.farm_bck_cluster') }}
                        </th>
                        <td>
                            @foreach($farm->farm_bck_clusters as $key => $farm_bck_cluster)
                                <span class="label label-info">{{ $farm_bck_cluster->bck_clus_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.farms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection