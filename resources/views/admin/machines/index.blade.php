@extends('layouts.admin')

@section('content')
@include('admin.machines.create')

@can('machine_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#createMachine">{{ trans('global.add') }} {{ trans('cruds.machine.title_singular') }}</button>
        </div>
        
    </div>
@endcan


<div class="card">
    <div class="card-header">
        {{ trans('cruds.machine.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <div id="example5_wrapper" class="dataTables_wrapper no-footer">
                <table id="example5" class="display min-w850 dataTable no-footer" role="grid" aria-describedby="example5_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="example5">
                                {{ trans('cruds.machine.fields.mch_name') }}
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example5">
                                {{ trans('cruds.machine.fields.mch_ip') }}
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example5">
                                {{ trans('cruds.machine.fields.mch_type') }}
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example5">
                                {{ trans('cruds.machine.fields.mch_sql') }}
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example5">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($machines as $key => $machine)
                        <tr role="row" data-entry-id="{{ $machine->id }}">
                            
                            <td>
                                {{ $machine->mch_name ?? '' }}
                            </td>
                            <td>
                                {{ $machine->mch_ip ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Machine::MCH_TYPE_SELECT[$machine->mch_type] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Machine::MCH_SQL_SELECT[$machine->mch_sql] ?? '' }}
                            </td>
                            <td>
                                @can('machine_show')
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.machines.show', $machine->id) }}">
                                    {{ trans('global.view') }}
                                </a>
                                @endcan
                
                                @can('machine_edit')
                                <a class="btn btn-xs btn-info" href="{{ route('admin.machines.edit', $machine->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                @endcan
                
                                @can('machine_delete')
                                <form action="{{ route('admin.machines.destroy', $machine->id) }}" method="POST"
                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('machine_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.machines.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan  

})

</script>
@endsection

<!-- Custom css and js files for this page -->

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
@endpush