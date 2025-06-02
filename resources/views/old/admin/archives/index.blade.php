@extends('layouts.admin')
@section('content')
@can('archive_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.archives.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.archive.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.archive.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Archive">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.archive.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.archive.fields.archived_at') }}
                    </th>
                    <th>
                        {{ trans('cruds.archive.fields.archived_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.archive.fields.archive_reason') }}
                    </th>
                    <th>
                        {{ trans('cruds.archive.fields.metadata') }}
                    </th>
                    <th>
                        {{ trans('cruds.archive.fields.storage_location') }}
                    </th>
                    <th>
                        {{ trans('cruds.storageLocation.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.storageLocation.fields.code') }}
                    </th>
                    <th>
                        {{ trans('cruds.storageLocation.fields.type') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('archive_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.archives.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.archives.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'archived_at', name: 'archived_at' },
{ data: 'archived_by_name', name: 'archived_by.name' },
{ data: 'archive_reason', name: 'archive_reason' },
{ data: 'metadata', name: 'metadata' },
{ data: 'storage_location_code', name: 'storage_location.code' },
{ data: 'storage_location.name', name: 'storage_location.name' },
{ data: 'storage_location.code', name: 'storage_location.code' },
{ data: 'storage_location.type', name: 'storage_location.type' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Archive').DataTable(dtOverrideGlobals);
  $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection