@extends('tenant.layouts.master')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => trans('cruds.generalSetting.title'), 'url' => '#'],
            ['title' => trans('global.list') . ' ' . trans('cruds.nationality.title'), 'url' => '#'],
        ];
        $buttons = [
            [
                'title' => trans('global.add') . ' ' . trans('cruds.nationality.title_singular'),
                'url' => route('admin.nationalities.create'),
                'permission' => 'nationality_create',
            ],
        ];
    @endphp
    @include('tenant.partials.breadcrumb')

    <div class="card"> 
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover w-100 datatable-Nationality">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.nationality.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.nationality.fields.name') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nationalities as $key => $nationality)
                            <tr data-entry-id="{{ $nationality->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $nationality->id ?? '' }}
                                </td>
                                <td>
                                    {{ $nationality->name ?? '' }}
                                </td>
                                <td>
                                    @include('tenant.partials.datatablesActions', [
                                        'viewGate' => 'nationality_show',
                                        'editGate' => 'nationality_edit',
                                        'deleteGate' => 'nationality_delete',
                                        'crudRoutePart' => 'nationalities',
                                        'row' => $nationality,
                                    ])   
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
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('nationality_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.nationalities.massDestroy') }}",
                    className: 'btn-danger-light rounded-pill',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            });
            let table = $('.datatable-Nationality:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
