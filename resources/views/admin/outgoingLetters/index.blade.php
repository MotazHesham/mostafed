@extends('layouts.admin')
@section('content')
@can('outgoing_letter_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.outgoing-letters.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.outgoingLetter.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.outgoingLetter.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-OutgoingLetter">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.outgoingLetter.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.outgoingLetter.fields.letter_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.outgoingLetter.fields.letter_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.outgoingLetter.fields.delivered_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.outgoingLetter.fields.recevier') }}
                    </th>
                    <th>
                        {{ trans('cruds.outgoingLetter.fields.subject') }}
                    </th>
                    <th>
                        {{ trans('cruds.outgoingLetter.fields.priority') }}
                    </th>
                    <th>
                        {{ trans('cruds.outgoingLetter.fields.outgoing_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.outgoingLetter.fields.attachments') }}
                    </th>
                    <th>
                        {{ trans('cruds.outgoingLetter.fields.note') }}
                    </th>
                    <th>
                        {{ trans('cruds.outgoingLetter.fields.incoming_letter') }}
                    </th>
                    <th>
                        {{ trans('cruds.outgoingLetter.fields.created_by') }}
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
@can('outgoing_letter_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.outgoing-letters.massDestroy') }}",
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
    ajax: "{{ route('admin.outgoing-letters.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'letter_number', name: 'letter_number' },
{ data: 'letter_date', name: 'letter_date' },
{ data: 'delivered_date', name: 'delivered_date' },
{ data: 'recevier_name', name: 'recevier.name' },
{ data: 'subject', name: 'subject' },
{ data: 'priority', name: 'priority' },
{ data: 'outgoing_type', name: 'outgoing_type' },
{ data: 'attachments', name: 'attachments', sortable: false, searchable: false },
{ data: 'note', name: 'note' },
{ data: 'incoming_letter_letter_number', name: 'incoming_letter.letter_number' },
{ data: 'created_by_name', name: 'created_by.name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-OutgoingLetter').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection