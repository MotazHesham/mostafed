<form method="POST" action="{{ route('admin.beneficiary-families.update', [$beneficiaryFamily->id]) }}"
    enctype="multipart/form-data" onsubmit="modalAjaxSubmit(event)">
    @method('PUT')
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="editFamilyModalLabel">
            {{ trans('global.edit') }} {{ trans('cruds.beneficiaryFamily.title_singular') }}
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">

        <div class="row gy-2">

            @include('utilities.form.photo-ajax', [
                'name' => 'photo',
                'id' => 'familyPhoto',
                'url' => route('admin.beneficiary-families.storeMedia'),
                'label' => 'cruds.beneficiaryFamily.fields.photo',
                'isRequired' => false,
                'model' => $beneficiaryFamily,
            ])
            @include('utilities.form.text', [
                'name' => 'identity_num',
                'label' => 'cruds.beneficiaryFamily.fields.identity_num',
                'isRequired' => true,
                'grid' => 'col-md-6', 
                'value' => $beneficiaryFamily->identity_num ?? '',
            ])
            @include('utilities.form.text', [
                'name' => 'name',
                'label' => 'cruds.beneficiaryFamily.fields.name',
                'isRequired' => false,
                'grid' => 'col-md-6',
                'value' => $beneficiaryFamily->name ?? '',
            ])  
            @include('utilities.form.select', [
                'name' => 'educational_qualification_id',
                'label' => 'cruds.beneficiaryFamily.fields.educational_qualification',
                'isRequired' => true,
                'grid' => 'col-md-6',
                'options' => $educational_qualifications,
                'value' => $beneficiaryFamily->educational_qualification_id ?? '',
            ])
            @include('utilities.form.select', [
                'name' => 'gender',
                'label' => 'cruds.beneficiaryFamily.fields.gender',
                'isRequired' => false,
                'grid' => 'col-md-6',
                'options' => ['' => trans('global.pleaseSelect')] + App\Models\BeneficiaryFamily::GENDER_SELECT,
                'value' => $beneficiaryFamily->gender ?? '',
            ])
            @include('utilities.form.date-ajax', [
                'name' => 'dob',
                'id' => 'dobFamily',
                'label' => 'cruds.beneficiaryFamily.fields.dob',
                'isRequired' => false,
                'grid' => 'col-md-6',
                'value' => $beneficiaryFamily->dob ?? '',
            ])
            @include('utilities.form.text', [
                'name' => 'phone',
                'label' => 'cruds.beneficiaryFamily.fields.phone',
                'isRequired' => false,
                'grid' => 'col-md-6',
                'value' => $beneficiaryFamily->phone ?? '',
            ])
            @include('utilities.form.text', [
                'name' => 'email',
                'label' => 'cruds.beneficiaryFamily.fields.email',
                'isRequired' => false,
                'grid' => 'col-md-6',
                'type' => 'email',
                'value' => $beneficiaryFamily->email ?? '',
            ])
            @include('utilities.form.select-ajax', [
                'name' => 'family_relationship_id',
                'label' => 'cruds.beneficiaryFamily.fields.family_relationship',
                'isRequired' => false,
                'grid' => 'col-md-6',
                'options' => $family_relationships,
                'value' => $beneficiaryFamily->family_relationship_id ?? '',
            ])
            @include('utilities.form.select', [
                'name' => 'marital_status_id',
                'label' => 'cruds.beneficiaryFamily.fields.marital_status',
                'isRequired' => false,
                'grid' => 'col-md-6',
                'options' => $marital_statuses,
                'value' => $beneficiaryFamily->marital_status_id ?? '',
            ])
            @include('utilities.form.select', [
                'name' => 'can_work',
                'label' => 'cruds.beneficiaryFamily.fields.can_work',
                'isRequired' => false,
                'grid' => 'col-md-6',
                'options' => ['' => trans('global.pleaseSelect')] + App\Models\BeneficiaryFamily::CAN_WORK_SELECT,
                'value' => $beneficiaryFamily->can_work ?? '',
            ])
            <div class="col-md-12">
                <div class="row">

                    @include('utilities.form.select', [
                        'name' => 'has_health_condition',
                        'id' => 'modal_has_health_condition',
                        'label' => 'cruds.beneficiaryFamily.fields.has_health_condition',
                        'isRequired' => false,
                        'options' => [
                            '' => trans('global.pleaseSelect'),
                            '1' => trans('global.yes'),
                            '0' => trans('global.no'),
                        ],
                        'grid' => 'col',
                        'value' => $beneficiaryFamily->health_condition_id ? '1' : '0',
                    ])
                    <div id="modal_health_condition_wrapper" style="display: none;" class="col">
                        @include('utilities.form.select', [
                            'name' => 'health_condition_id',
                            'id' => 'modal_health_condition_id',
                            'label' => 'cruds.beneficiaryFamily.fields.health_condition',
                            'isRequired' => false,
                            'options' => $health_conditions->toArray() + [
                                'other' => trans('global.other'),
                            ],
                            'grid' => '',
                            'value' => $beneficiaryFamily->health_condition_id ?? '',
                        ])
                    </div>
                    <div id="modal_custom_health_condition_wrapper" style="display: none;" class="col">
                        @include('utilities.form.text', [
                            'name' => 'custom_health_condition',
                            'id' => 'modal_custom_health_condition',
                            'label' => 'cruds.beneficiaryFamily.fields.custom_health_condition',
                            'isRequired' => false,
                            'grid' => '',
                            'value' => $beneficiaryFamily->custom_health_condition ?? '',
                        ])
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">

                    @include('utilities.form.select', [
                        'name' => 'has_disability',
                        'id' => 'modal_has_disability',
                        'label' => 'cruds.beneficiaryFamily.fields.has_disability',
                        'isRequired' => false,
                        'options' => [
                            '' => trans('global.pleaseSelect'),
                            '1' => trans('global.yes'),
                            '0' => trans('global.no'),
                        ],
                        'grid' => 'col',
                        'value' => $beneficiaryFamily->disability_type_id ? '1' : '0',
                    ])
                    <div id="modal_disability_type_wrapper" style="display: none;" class="col">
                        @include('utilities.form.select', [
                            'name' => 'disability_type_id',
                            'id' => 'modal_disability_type_id',
                            'label' => 'cruds.beneficiaryFamily.fields.disability_type',
                            'isRequired' => false,
                            'options' => $disability_types->toArray() + [
                                'other' => trans('global.other'),
                            ],
                            'grid' => '',
                            'value' => $beneficiaryFamily->disability_type_id ?? '',
                        ])
                    </div>
                    <div id="modal_custom_disability_type_wrapper" style="display: none;" class="col">
                        @include('utilities.form.text', [
                            'name' => 'custom_disability_type',
                            'id' => 'modal_custom_disability_type',
                            'label' => 'cruds.beneficiaryFamily.fields.custom_disability_type',
                            'isRequired' => false,
                            'grid' => '',
                            'value' => $beneficiaryFamily->custom_disability_type ?? '',
                        ])
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            {{ trans('global.cancel') }}
        </button>
        <button type="submit" class="btn btn-primary">
            {{ trans('global.save') }}
        </button>
    </div>

</form>

<script>
    handleHealthConditionToggle('{{ $beneficiaryFamily->health_condition_id ? '1' : '0' }}');
    handleDisabilityToggle('{{ $beneficiaryFamily->disability_type_id ? '1' : '0' }}'); 
    handleHealthConditionTypeChange('{{ $beneficiaryFamily->health_condition->name ?? '' }}');
    handleDisabilityTypeChange('{{ $beneficiaryFamily->disability_type->name ?? '' }}');
    
    /* Health Condition Toggle */
    function handleHealthConditionToggle(value) {
        var modalHealthConditionWrapper = document.getElementById('modal_health_condition_wrapper');
        var modalCustomHealthConditionWrapper = document.getElementById('modal_custom_health_condition_wrapper');
        
        if (value === '1') {
            modalHealthConditionWrapper.style.display = 'block';
        } else {
            modalHealthConditionWrapper.style.display = 'none';
            modalCustomHealthConditionWrapper.style.display = 'none';
        }
    }

    function handleHealthConditionTypeChange(value) {
        var modalCustomHealthConditionWrapper = document.getElementById('modal_custom_health_condition_wrapper');
        
        if (value == 'other' || value == 'أخرى') {
            modalCustomHealthConditionWrapper.style.display = 'block';
        } else {
            modalCustomHealthConditionWrapper.style.display = 'none';
        }
    }

    /* Disability Type Toggle */
    function handleDisabilityToggle(value) {
        var modalDisabilityTypeWrapper = document.getElementById('modal_disability_type_wrapper');
        var modalCustomDisabilityTypeWrapper = document.getElementById('modal_custom_disability_type_wrapper');
        
        if (value === '1') {
            modalDisabilityTypeWrapper.style.display = 'block';
        } else {
            modalDisabilityTypeWrapper.style.display = 'none';
            modalCustomDisabilityTypeWrapper.style.display = 'none';
        }
    }

    function handleDisabilityTypeChange(value) {
        var modalCustomDisabilityTypeWrapper = document.getElementById('modal_custom_disability_type_wrapper');
        
        if (value == 'other' || value == 'أخرى') {
            modalCustomDisabilityTypeWrapper.style.display = 'block';
        } else {
            modalCustomDisabilityTypeWrapper.style.display = 'none';
        }
    }

    var modalHasHealthConditionSelect = document.getElementById('modal_has_health_condition');
    var modalHealthConditionSelect = document.getElementById('modal_health_condition_id');
    var modalHasDisabilitySelect = document.getElementById('modal_has_disability');
    var modalDisabilityTypeSelect = document.getElementById('modal_disability_type_id');

    if (modalHasHealthConditionSelect) {
        modalHasHealthConditionSelect.addEventListener('change', function() {
            handleHealthConditionToggle(this.value);
        });
    }

    if (modalHealthConditionSelect) {
        modalHealthConditionSelect.addEventListener('change', function() {
            handleHealthConditionTypeChange(this.value);
        });
    }

    if (modalHasDisabilitySelect) {
        modalHasDisabilitySelect.addEventListener('change', function() {
            handleDisabilityToggle(this.value);
        });
    }

    if (modalDisabilityTypeSelect) {
        modalDisabilityTypeSelect.addEventListener('change', function() {
            handleDisabilityTypeChange(this.value);
        });
    } 
</script>
