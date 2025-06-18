@extends('tenant.layouts.master')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => trans('cruds.beneficiaryOrdersManagement.title'), 'url' => '#'],
            [
                'title' => trans('global.list') . ' ' . trans('cruds.beneficiaryOrder.title'),
                'url' => route('admin.beneficiary-orders.index'),
            ],
        ];
        $buttons = [
            [
                'title' => trans('global.add') . ' ' . trans('cruds.beneficiaryOrder.title_singular'),
                'url' => route('admin.beneficiary-orders.create'),
                'permission' => 'beneficiary_order_create',
            ],
        ];
    @endphp
    @include('tenant.partials.breadcrumb')

    <div class="card">
        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable w-100 datatable-BeneficiaryOrder">
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
                            {{ trans('cruds.beneficiaryOrder.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.service_type') }}
                        </th> 
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.status') }}
                        </th> 
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.specialist') }}
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
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('beneficiary_order_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.beneficiary-orders.massDestroy') }}",
                    className: 'btn-danger-light rounded-pill',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).data(), function(entry) {
                            return entry.id
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

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: {
                    url: "{{ route('admin.beneficiary-orders.index') }}",
                    data: {
                        status: "{{ request('status','current') }}"
                    }
                }, 
                columns: [{
                        data: 'placeholder',
                        name: 'placeholder'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    }, 
                    {
                        data: 'beneficiary_user_name',
                        name: 'beneficiary.user.name'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'service_type',
                        name: 'service_type'
                    }, 
                    {
                        data: 'status_name',
                        name: 'status.name'
                    }, 
                    {
                        data: 'specialist_name',
                        name: 'specialist.name'
                    },
                    {
                        data: 'actions',
                        name: '{{ trans('global.actions') }}'
                    }
                ],
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            };
            let table = $('.datatable-BeneficiaryOrder').DataTable(dtOverrideGlobals);
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        });
    </script>
@endsection
