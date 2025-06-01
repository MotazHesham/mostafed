@can('beneficiary_order_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.beneficiary-orders.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.beneficiaryOrder.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.beneficiaryOrder.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-beneficiaryBeneficiaryOrders">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.beneficiary') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.service_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.service') }}
                        </th>
                        <th>
                            {{ trans('cruds.service.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.attachment') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.accept_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.done') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.specialist') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($beneficiaryOrders as $key => $beneficiaryOrder)
                        <tr data-entry-id="{{ $beneficiaryOrder->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $beneficiaryOrder->id ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryOrder->beneficiary->dob ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BeneficiaryOrder::SERVICE_TYPE_SELECT[$beneficiaryOrder->service_type] ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryOrder->service->type ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryOrder->service->title ?? '' }}
                            </td>
                            <td>
                                {{ $beneficiaryOrder->description ?? '' }}
                            </td>
                            <td>
                                @if($beneficiaryOrder->attachment)
                                    <a href="{{ $beneficiaryOrder->attachment->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $beneficiaryOrder->status->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\BeneficiaryOrder::ACCEPT_STATUS_RADIO[$beneficiaryOrder->accept_status] ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $beneficiaryOrder->done ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $beneficiaryOrder->done ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $beneficiaryOrder->specialist->name ?? '' }}
                            </td>
                            <td>
                                @can('beneficiary_order_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.beneficiary-orders.show', $beneficiaryOrder->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('beneficiary_order_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.beneficiary-orders.edit', $beneficiaryOrder->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('beneficiary_order_delete')
                                    <form action="{{ route('admin.beneficiary-orders.destroy', $beneficiaryOrder->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('beneficiary_order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.beneficiary-orders.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-beneficiaryBeneficiaryOrders:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection