@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.domain.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.domains.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.domain.fields.id') }}
                        </th>
                        <td>
                            {{ $domain->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.domain.fields.farm_name') }}
                        </th>
                        <td>
                            {{ $domain->farm_name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.domains.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#farm_domain_farms" role="tab" data-toggle="tab">
                {{ trans('cruds.farm.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="farm_domain_farms">
            @includeIf('admin.domains.relationships.farmDomainFarms', ['farms' => $domain->farmDomainFarms])
        </div>
    </div>
</div>

@endsection