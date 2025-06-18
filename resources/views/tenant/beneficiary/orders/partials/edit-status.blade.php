<ul class="list-group list-group-flush border rounded-3 mt-3 shadow-sm">
    <li class="list-group-item p-3">
        <div class="card shadow-sm">
            <div class="ribbon-2 ribbon-secondary ribbon-left">
                <span class="ribbon-text">{{ trans('cruds.beneficiaryOrder.fields.status') }}</span>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-end gap-2 justify-content-between align-items-center flex-wrap mb-3">
                    <span></span>
                    <span
                        class="badge bg-{{ $beneficiaryOrder->status->badge_class ?? 'primary' }}-transparent">{{ $beneficiaryOrder->status->name ?? '' }}</span>
                </div>
            </div>
        </div>
        <div class="mt-5">
            @if ($beneficiaryOrder->done)
                <div class="text-center p-4">
                    <span class="avatar avatar-xl avatar-rounded bg-success-transparent svg-success">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
                            <rect width="256" height="256" fill="none" />
                            <circle cx="128" cy="128" r="96" opacity="0.2" />
                            <polyline points="88 136 112 160 168 104" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                            <circle cx="128" cy="128" r="96" fill="none" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="16" />
                        </svg>
                    </span>
                    <h3 class="mt-2">Successful <span class="fs-14 align-middle">&#127881;</span></h3>
                </div>
            @else
                <form action="{{ route('admin.beneficiary-orders.update-status', $beneficiaryOrder) }}" class="p-3"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        @if (!$beneficiaryOrder->accept_status)
                            @include('utilities.form.radio', [
                                'name' => 'accept_status',
                                'label' => 'cruds.beneficiaryOrder.fields.accept_status',
                                'isRequired' => true,
                                'options' => [
                                    'yes' => 'الطلب مقبول',
                                    'no' => 'الطلب مرفوض',
                                ],
                                'value' => $beneficiaryOrder->accept_status,
                                'grid' => 'col-md-6',
                            ])
                            <div class="col-md-12" id="refused_reason_wrapper" style="display: none;">
                                @include('utilities.form.textarea', [
                                    'name' => 'refused_reason',
                                    'label' => 'cruds.beneficiaryOrder.fields.refused_reason',
                                    'isRequired' => false,
                                    'value' => $beneficiaryOrder->refused_reason,
                                ])
                            </div>
                        @else
                            @include('utilities.form.select', [
                                'name' => 'status_id',
                                'label' => 'cruds.beneficiaryOrder.fields.status',
                                'isRequired' => false,
                                'grid' => 'col-md-6',
                                'options' => $statuses,
                                'value' => $beneficiaryOrder->status_id,
                            ])
                            @include('utilities.form.select', [
                                'name' => 'specialist_id',
                                'label' => 'cruds.beneficiaryOrder.fields.specialist',
                                'isRequired' => false,
                                'grid' => 'col-md-6',
                                'options' => $specialists,
                                'search' => true,
                                'value' => $beneficiaryOrder->specialist_id,
                            ])
                            @include('utilities.form.textarea', [
                                'name' => 'note',
                                'label' => 'cruds.beneficiaryOrder.fields.note',
                                'isRequired' => false,
                                'value' => $beneficiaryOrder->note,
                            ])
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary  w-20 mt-3">
                        {{ trans('global.update') }}
                    </button>
                    <button type="submit" class="btn btn-secondary  w-20 mt-3" name="finish" value="1">
                        {{ trans('global.finish') }} {{ trans('cruds.beneficiaryOrder.title_singular') }}
                    </button>

                </form>
            @endif
        </div>
    </li>
</ul>

@section('scripts')
    @parent
    <script>
        handleRejectionReasonToggle('{{ $beneficiaryOrder->accept_status }}');

        function handleRejectionReasonToggle(value) {
            var RejectionReasonWrapper = document.getElementById('refused_reason_wrapper');
            if(RejectionReasonWrapper){
                if (value === 'no') {
                    RejectionReasonWrapper.style.display = 'block';
                } else {
                    RejectionReasonWrapper.style.display = 'none';
                    document.getElementById('refused_reason').value = '';
                }
            }
        }
        var StatusSelect = document.getElementsByName('accept_status');
        if (StatusSelect.length > 0) {
            StatusSelect.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    handleRejectionReasonToggle(this.value);
                });
            });
        }
    </script>
@endsection
