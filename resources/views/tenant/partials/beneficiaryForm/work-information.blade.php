<div class="row gy-4">
    @include('utilities.form.select', [
        'name' => 'educational_qualification_id',
        'label' => 'cruds.beneficiary.fields.educational_qualification',
        'isRequired' => false,
        'options' => $educational_qualifications,
        'grid' => 'col-md-6',
        'value' => $beneficiary->educational_qualification_id ?? '',
    ])
    @include('utilities.form.select', [
        'name' => 'job_type_id',
        'label' => 'cruds.beneficiary.fields.job_type',
        'isRequired' => false,
        'options' => $job_types,
        'grid' => 'col-md-6',
        'value' => $beneficiary->job_type_id ?? '',
    ])
    <div class="col-md-12">
        <div class="row">

            @include('utilities.form.select', [
                'name' => 'has_health_condition',
                'label' => 'cruds.beneficiary.fields.has_health_condition',
                'isRequired' => false,
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
                'isRequired' => false,
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
    @include('utilities.form.select', [
        'name' => 'can_work',
        'label' => 'cruds.beneficiary.fields.can_work',
        'isRequired' => false,
        'options' => ['' => trans('global.pleaseSelect')] + App\Models\Beneficiary::CAN_WORK_SELECT,
        'grid' => 'col-md-4',
        'value' => $beneficiary->can_work ?? '',
    ])
</div>
@section('scripts')
    @parent
    <script>
        /* Health Condition Toggle */
        var hasHealthConditionSelect = document.getElementById('has_health_condition');
        var healthConditionWrapper = document.getElementById('health_condition_wrapper');
        var healthConditionSelect = document.getElementById('health_condition_id');
        var customHealthConditionWrapper = document.getElementById('custom_health_condition_wrapper');

        if (hasHealthConditionSelect && healthConditionWrapper) {
            hasHealthConditionSelect.addEventListener('change', function() {
                if (this.value === '1') {
                    healthConditionWrapper.style.display = 'block';
                } else {
                    healthConditionWrapper.style.display = 'none';
                    customHealthConditionWrapper.style.display = 'none';
                }
            });
        }

        if (healthConditionSelect && customHealthConditionWrapper) {
            healthConditionSelect.addEventListener('change', function() {
                var selectedText = this.options[this.selectedIndex].text.trim().toLowerCase();
                if (selectedText == 'other' || selectedText == 'أخرى') {
                    customHealthConditionWrapper.style.display = 'block';
                } else {
                    customHealthConditionWrapper.style.display = 'none';
                }
            });
        }
        /* Health Condition Toggle */

        /* Disability Type Toggle */
        var hasDisabilitySelect = document.getElementById('has_disability');
        var disabilityTypeWrapper = document.getElementById('disability_type_wrapper');
        var disabilityTypeSelect = document.getElementById('disability_type_id');
        var customDisabilityTypeWrapper = document.getElementById('custom_disability_type_wrapper');

        if (hasDisabilitySelect && disabilityTypeWrapper) {
            hasDisabilitySelect.addEventListener('change', function() {
                if (this.value === '1') {
                    disabilityTypeWrapper.style.display = 'block';
                } else {
                    disabilityTypeWrapper.style.display = 'none';
                    customDisabilityTypeWrapper.style.display = 'none';
                }
            });
        }

        if (disabilityTypeSelect && customDisabilityTypeWrapper) {
            disabilityTypeSelect.addEventListener('change', function() {
                var selectedText = this.options[this.selectedIndex].text.trim().toLowerCase();
                if (selectedText == 'other' || selectedText == 'أخرى') {
                    customDisabilityTypeWrapper.style.display = 'block';
                } else {
                    customDisabilityTypeWrapper.style.display = 'none';
                }
            });
        }
        /* Disability Type Toggle */
    </script>
@endsection
