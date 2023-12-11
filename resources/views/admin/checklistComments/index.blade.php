@extends('layouts.admin')
@section('content')
@can('checklist_comment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.checklist-comments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.checklistComment.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.checklistComment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="example5" class="display min-w850 dataTable datatable-ChecklistComment" role="grid" aria-describedby="example5_info">
                <thead>
                    <tr>
                       <th class="sorting" tabindex="0" aria-controls="example5">
                            {{ trans('cruds.checklistComment.fields.id') }}
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example5">
                            {{ trans('cruds.checklistComment.fields.user') }}
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example5">
                            {{ trans('cruds.checklistComment.fields.checklist') }}
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example5">
                            {{ trans('global.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($checklistComments as $key => $checklistComment)
                        <tr data-entry-id="{{ $checklistComment->id }}">
                            <td>
                                {{ $checklistComment->id ?? '' }}
                            </td>
                            <td>
                                {{ $checklistComment->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $checklistComment->checklist->chk_name ?? '' }}
                            </td>
                            <td>
                                @can('checklist_comment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.checklist-comments.show', $checklistComment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('checklist_comment_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.checklist-comments.edit', $checklistComment->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('checklist_comment_delete')
                                    <form action="{{ route('admin.checklist-comments.destroy', $checklistComment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('checklist_comment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.checklist-comments.massDestroy') }}",
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