@extends('central.layouts.master')
@section('content')
@can('setting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.settings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.setting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.setting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Setting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.key') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.value') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.key') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.options') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.value') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.lang') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.group_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.file') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.order_level') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.grid_col') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($settings as $key => $setting)
                        <tr data-entry-id="{{ $setting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $setting->id ?? '' }}
                            </td>
                            <td>
                                {{ $setting->key ?? '' }}
                            </td>
                            <td>
                                {{ $setting->value ?? '' }}
                            </td>
                            <td>
                                {{ $setting->name ?? '' }}
                            </td>
                            <td>
                                {{ $setting->key ?? '' }}
                            </td>
                            <td>
                                {{ $setting->options ?? '' }}
                            </td>
                            <td>
                                {{ $setting->value ?? '' }}
                            </td>
                            <td>
                                {{ $setting->lang ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Setting::TYPE_SELECT[$setting->type] ?? '' }}
                            </td>
                            <td>
                                {{ $setting->group_name ?? '' }}
                            </td>
                            <td>
                                @if($setting->file)
                                    <a href="{{ $setting->file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $setting->order_level ?? '' }}
                            </td>
                            <td>
                                {{ $setting->grid_col ?? '' }}
                            </td>
                            <td>
                                @can('setting_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.settings.show', $setting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('setting_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.settings.edit', $setting->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('setting_delete')
                                    <form action="{{ route('admin.settings.destroy', $setting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('setting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.settings.massDestroy') }}",
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
  let table = $('.datatable-Setting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection