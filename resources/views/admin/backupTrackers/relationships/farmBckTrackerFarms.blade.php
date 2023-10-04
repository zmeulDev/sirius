<div class="m-3">
    @can('farm_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.farms.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.farm.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.farm.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-farmBckTrackerFarms">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.farm.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.farm.fields.farm_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.farm.fields.farm_datacenter') }}
                            </th>
                            <th>
                                {{ trans('cruds.farm.fields.farm_prefix') }}
                            </th>
                            <th>
                                {{ trans('cruds.farm.fields.farm_domain') }}
                            </th>
                            <th>
                                {{ trans('cruds.farm.fields.farm_bck_tracker') }}
                            </th>
                            <th>
                                {{ trans('cruds.farm.fields.farm_bck_cluster') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($farms as $key => $farm)
                            <tr data-entry-id="{{ $farm->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $farm->id ?? '' }}
                                </td>
                                <td>
                                    {{ $farm->farm_name ?? '' }}
                                </td>
                                <td>
                                    @foreach($farm->farm_datacenters as $key => $item)
                                        <span class="badge badge-info">{{ $item->datacenter_name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $farm->farm_prefix ?? '' }}
                                </td>
                                <td>
                                    @foreach($farm->farm_domains as $key => $item)
                                        <span class="badge badge-info">{{ $item->farm_name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($farm->farm_bck_trackers as $key => $item)
                                        <span class="badge badge-info">{{ $item->bck_tracker_name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($farm->farm_bck_clusters as $key => $item)
                                        <span class="badge badge-info">{{ $item->bck_clus_name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('farm_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.farms.show', $farm->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('farm_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.farms.edit', $farm->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('farm_delete')
                                        <form action="{{ route('admin.farms.destroy', $farm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('farm_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.farms.massDestroy') }}",
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-farmBckTrackerFarms:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection