<form method="POST" action="{{ route(($routeName ?? 'admin.beneficiaries.update'), $beneficiary->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <div class="row gy-4">
        @include('utilities.form.select', [
            'name' => 'educational_qualification_id',
            'label' => 'cruds.beneficiary.fields.educational_qualification',
            'isRequired' => true,
            'options' => $educational_qualifications,
            'grid' => 'col-md-4',
            'value' => $beneficiary->educational_qualification_id ?? '',
        ])
        @include('utilities.form.select', [
            'name' => 'job_type_id',
            'label' => 'cruds.beneficiary.fields.job_type',
            'isRequired' => true,
            'options' => $job_types,
            'grid' => 'col-md-4',
            'value' => $beneficiary->job_type_id ?? '',
        ])
        @include('utilities.form.select', [
            'name' => 'can_work',
            'label' => 'cruds.beneficiary.fields.can_work',
            'isRequired' => true,
            'options' => ['' => trans('global.pleaseSelect')] + App\Models\Beneficiary::CAN_WORK_SELECT,
            'grid' => 'col-md-4',
            'value' => $beneficiary->can_work ?? '',
        ])
        <div class="col-md-12">
            <div class="row">

                @include('utilities.form.select', [
                    'name' => 'has_health_condition',
                    'label' => 'cruds.beneficiary.fields.has_health_condition',
                    'isRequired' => true,
                    'options' => [
                        '' => trans('global.pleaseSelect'),
                        '1' => trans('global.yes'),
                        '0' => trans('global.no'),
                    ],
                    'grid' => 'col',
                    'value' => $beneficiary->health_condition_id ? '1' : '0',
                ])
                <div id="health_condition_wrapper" style="display: none;" class="col">
                    @include('utilities.form.select', [
                        'name' => 'health_condition_id',
                        'label' => 'cruds.beneficiary.fields.health_condition',
                        'isRequired' => false,
                        'options' => $health_conditions->toArray(),
                        'grid' => '',
                        'value' => $beneficiary->health_condition_id ?? '',
                    ])
                </div>
                <div id="custom_health_condition_wrapper" style="display: none;" class="col">
                    @include('utilities.form.text', [
                        'name' => 'custom_health_condition',
                        'label' => 'cruds.beneficiary.fields.custom_health_condition',
                        'isRequired' => false,
                        'grid' => '',
                        'value' => $beneficiary->custom_health_condition ?? '',
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">

                @include('utilities.form.select', [
                    'name' => 'has_disability',
                    'label' => 'cruds.beneficiary.fields.has_disability',
                    'isRequired' => true,
                    'options' => [
                        '' => trans('global.pleaseSelect'),
                        '1' => trans('global.yes'),
                        '0' => trans('global.no'),
                    ],
                    'grid' => 'col',
                    'value' => $beneficiary->disability_type_id ? '1' : '0',
                ])
                <div id="disability_type_wrapper" style="display: none;" class="col">
                    @include('utilities.form.select', [
                        'name' => 'disability_type_id',
                        'label' => 'cruds.beneficiary.fields.disability_type',
                        'isRequired' => false,
                        'options' => $disability_types->toArray(),
                        'grid' => '',
                        'value' => $beneficiary->disability_type_id ?? '',
                    ])
                </div>
                <div id="custom_disability_type_wrapper" style="display: none;" class="col">
                    @include('utilities.form.text', [
                        'name' => 'custom_disability_type',
                        'label' => 'cruds.beneficiary.fields.custom_disability_type',
                        'isRequired' => false,
                        'grid' => '',
                        'value' => $beneficiary->custom_disability_type ?? '',
                    ])
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="step" value="work_information">
        {{ trans('global.update') }}
    </button>
</form>
@section('scripts')
    @parent
    <script>
        handleHealthConditionToggle('{{ $beneficiary->health_condition_id ? '1' : '0' }}');
        handleDisabilityToggle('{{ $beneficiary->disability_type_id ? '1' : '0' }}');
        handleHealthConditionTypeChange('{{ $beneficiary->health_condition->name ?? '' }}');
        handleDisabilityTypeChange('{{ $beneficiary->disability_type->name ?? '' }}');

        /* Health Condition Toggle */
        function handleHealthConditionToggle(value) {
            var HealthConditionWrapper = document.getElementById('health_condition_wrapper');
            var CustomHealthConditionWrapper = document.getElementById('custom_health_condition_wrapper');

            if (value === '1') {
                HealthConditionWrapper.style.display = 'block';
            } else {
                HealthConditionWrapper.style.display = 'none';
                CustomHealthConditionWrapper.style.display = 'none';
                document.getElementById('health_condition_id').value = '';
                document.getElementById('custom_health_condition').value = '';
            }
        }

        function handleHealthConditionTypeChange(value) {
            var CustomHealthConditionWrapper = document.getElementById('custom_health_condition_wrapper');

            if (value == 'other' || value == 'أخرى') {
                CustomHealthConditionWrapper.style.display = 'block';
            } else {
                CustomHealthConditionWrapper.style.display = 'none';
                document.getElementById('custom_health_condition').value = '';
            }
        }

        /* Disability Type Toggle */
        function handleDisabilityToggle(value) {
            var DisabilityTypeWrapper = document.getElementById('disability_type_wrapper');
            var CustomDisabilityTypeWrapper = document.getElementById('custom_disability_type_wrapper');

            if (value === '1') {
                DisabilityTypeWrapper.style.display = 'block';
            } else {
                DisabilityTypeWrapper.style.display = 'none';
                CustomDisabilityTypeWrapper.style.display = 'none';
                document.getElementById('disability_type_id').value = '';
                document.getElementById('custom_disability_type').value = '';
            }
        }

        function handleDisabilityTypeChange(value) {
            var CustomDisabilityTypeWrapper = document.getElementById('custom_disability_type_wrapper');

            if (value == 'other' || value == 'أخرى') {
                CustomDisabilityTypeWrapper.style.display = 'block';
            } else {
                CustomDisabilityTypeWrapper.style.display = 'none';
                document.getElementById('custom_disability_type').value = '';
            }
        }

        var HasHealthConditionSelect = document.getElementById('has_health_condition');
        var HealthConditionSelect = document.getElementById('health_condition_id');
        var HasDisabilitySelect = document.getElementById('has_disability');
        var DisabilityTypeSelect = document.getElementById('disability_type_id');

        if (HasHealthConditionSelect) {
            HasHealthConditionSelect.addEventListener('change', function() {
                handleHealthConditionToggle(this.value);
            });
        }

        if (HealthConditionSelect) {
            HealthConditionSelect.addEventListener('change', function() {
                var selectedText = this.options[this.selectedIndex].text.trim().toLowerCase();
                handleHealthConditionTypeChange(selectedText);
            });
        }

        if (HasDisabilitySelect) {
            HasDisabilitySelect.addEventListener('change', function() {
                handleDisabilityToggle(this.value);
            });
        }

        if (DisabilityTypeSelect) {
            DisabilityTypeSelect.addEventListener('change', function() {
                var selectedText = this.options[this.selectedIndex].text.trim().toLowerCase();
                handleDisabilityTypeChange(selectedText);
            });
        }
    </script>
@endsection
