<ul class="list-group list-group-flush border rounded-3 mt-3 shadow-sm">
    <li class="list-group-item p-3"> 
        <div class="card shadow-sm">
            <div class="ribbon-2 ribbon-secondary ribbon-left">
                <span class="ribbon-text">{{ trans('cruds.beneficiary.profile.profile_status') }}</span>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-end gap-2 justify-content-between align-items-center flex-wrap mb-3"> 
                    <span></span> 
                    <span class="badge bg-success">{{ $beneficiary->profile_status ? \App\Models\Beneficiary::PROFILE_STATUS_SELECT[$beneficiary->profile_status] : '-' }}</span>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <form action="{{ route('admin.beneficiaries.update-status', $beneficiary) }}" class="p-3" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    @include('utilities.form.radio', [
                        'name' => 'profile_status',
                        'label' => 'cruds.beneficiary.fields.profile_status',
                        'isRequired' => true,
                        'options' => [
                            'in_review' => 'قيد المراجعة',
                            'approved' => 'موافق عليه',
                            'rejected' => 'مرفوض',
                        ],
                        'value' => $beneficiary->profile_status,
                        'grid' => 'col-md-6',
                    ])
                    @include('utilities.form.select', [
                        'name' => 'specialist_id',
                        'label' => 'cruds.beneficiary.fields.specialist',
                        'isRequired' => false,
                        'grid' => 'col-md-6',
                        'options' => $specialists,
                        'search' => true,
                        'value' => $beneficiary->specialist_id,
                    ])
                    <div class="col-md-12" id="rejection_reason_wrapper" style="display: none;">
                        @include('utilities.form.textarea', [
                            'name' => 'rejection_reason',
                            'label' => 'cruds.beneficiary.fields.rejection_reason',
                            'isRequired' => false,
                            'value' => $beneficiary->rejection_reason,
                        ])
                    </div>
                </div>
                <button type="submit" class="btn btn-primary  w-20 mt-3">
                    {{ trans('global.update') }}
                </button>
            </form>
        </div>
    </li>
</ul>

@section('scripts')
    @parent
    <script>
        handleRejectionReasonToggle('{{ $beneficiary->profile_status }}');

        function handleRejectionReasonToggle(value) {
            var RejectionReasonWrapper = document.getElementById('rejection_reason_wrapper');
            if (value === 'rejected') {
                RejectionReasonWrapper.style.display = 'block';
            } else {
                RejectionReasonWrapper.style.display = 'none';
                document.getElementById('rejection_reason').value = '';
            }
        }
        var StatusSelect = document.getElementsByName('profile_status');
        if (StatusSelect.length > 0) {
            StatusSelect.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    handleRejectionReasonToggle(this.value);
                });
            });
        }
    </script>
@endsection
