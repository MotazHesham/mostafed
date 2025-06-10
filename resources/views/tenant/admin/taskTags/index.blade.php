@extends('tenant.layouts.master')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => trans('cruds.taskManagement.title'), 'url' => '#'],
            [
                'title' => trans('global.list') . ' ' . trans('cruds.taskTag.title'),
                'url' => route('admin.task-tags.index'),
            ],
        ];
        $buttons = [
            [
                'title' => trans('global.add') . ' ' . trans('cruds.taskTag.title_singular'),
                'url' => route('admin.task-tags.create'),
                'permission' => 'task_tag_create',
            ],
        ];
    @endphp
    @include('tenant.partials.breadcrumb')

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover w-100 datatable-TaskTag">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.taskTag.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.taskTag.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.taskTag.fields.badge_class') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taskTags as $key => $taskTag)
                            <tr data-entry-id="{{ $taskTag->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $taskTag->id ?? '' }}
                                </td>
                                <td>
                                    {{ $taskTag->name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\TaskTag::BADGE_CLASS_SELECT[$taskTag->badge_class] ?? '' }}
                                </td>
                                <td>
                                    @include('tenant.partials.datatablesActions', [
                                        'viewGate' => 'task_tag_show',
                                        'editGate' => 'task_tag_edit',
                                        'deleteGate' => 'task_tag_delete',
                                        'crudRoutePart' => 'task-tags',
                                        'row' => $taskTag,
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
            @can('task_tag_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.task-tags.massDestroy') }}",
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
            let table = $('.datatable-TaskTag:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
