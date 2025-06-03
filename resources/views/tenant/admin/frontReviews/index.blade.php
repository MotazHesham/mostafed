@extends('tenant.layouts.master')
@section('content')
@can('front_review_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.front-reviews.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.frontReview.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.frontReview.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable w-100 datatable-FrontReview">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.frontReview.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.frontReview.fields.photo') }}
                    </th>
                    <th>
                        {{ trans('cruds.frontReview.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.frontReview.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.frontReview.fields.review') }}
                    </th>
                    <th>
                        {{ trans('cruds.frontReview.fields.rate') }}
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
@can('front_review_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.front-reviews.massDestroy') }}",
    className: 'btn-danger-light rounded-pill',
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
    ajax: "{{ route('admin.front-reviews.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'photo', name: 'photo', sortable: false, searchable: false },
{ data: 'name', name: 'name' },
{ data: 'email', name: 'email' },
{ data: 'review', name: 'review' },
{ data: 'rate', name: 'rate' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-FrontReview').DataTable(dtOverrideGlobals);
  $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection