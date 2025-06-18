
<form method="POST" action="{{ route(($routeName ?? 'admin.beneficiaries.update'), $beneficiary->id) }}"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="user_id" value="{{ $user->id }}">
    <div class="row gy-4">
        @include('utilities.form.text', [
            'name' => 'name',
            'label' => 'cruds.user.fields.name',
            'isRequired' => true,
            'grid' => 'col-md-6',
            'value' => $user->name ?? '',
        ])
        @include('utilities.form.select', [
            'name' => 'nationality_id',
            'label' => 'cruds.beneficiary.fields.nationality',
            'isRequired' => true,
            'options' => $nationalities,
            'grid' => 'col-md-6',
            'value' => $beneficiary->nationality_id ?? '',
            'search' => true,
        ])
        @include('utilities.form.date', [
            'name' => 'dob',
            'id' => 'dobBeneficiary',
            'label' => 'cruds.beneficiary.fields.dob',
            'isRequired' => false,
            'grid' => 'col-md-6',
            'hijri' => true,
            'value' => $beneficiary->dob ?? '',
        ])
        @include('utilities.form.select', [
            'name' => 'marital_status_id',
            'label' => 'cruds.beneficiary.fields.marital_status',
            'isRequired' => true,
            'options' => $marital_statuses,
            'grid' => 'col-md-6',
            'value' => $beneficiary->marital_status_id ?? '',
        ])
        @include('utilities.form.text', [
            'name' => 'address',
            'label' => 'cruds.beneficiary.fields.address',
            'isRequired' => true,
            'grid' => 'col-md-6',
            'value' => $beneficiary->address ?? '',
        ])
        @include('utilities.form.map', [
            'name' => 'map',
            'label' => 'cruds.beneficiary.fields.map',
            'grid' => 'col-md-6',
            'isRequired' => false, 
            'latitude' => $beneficiary->latitude ?? '',
            'longitude' => $beneficiary->longitude ?? '',
        ])
        @include('utilities.form.select', [
            'name' => 'district_id',
            'label' => 'cruds.beneficiary.fields.district',
            'isRequired' => true,
            'options' => $districts,
            'grid' => 'col-md-3',
            'value' => $beneficiary->district_id ?? '',
            'search' => true,
        ])
        @include('utilities.form.text', [
            'name' => 'street',
            'label' => 'cruds.beneficiary.fields.street',
            'isRequired' => false,
            'grid' => 'col-md-3',
            'value' => $beneficiary->street ?? '',
        ])
        @include('utilities.form.text', [
            'name' => 'building_number',
            'label' => 'cruds.beneficiary.fields.building_number',
            'isRequired' => false,
            'grid' => 'col-md-3',
            'value' => $beneficiary->building_number ?? '',
        ])
        @include('utilities.form.text', [
            'name' => 'floor_number',
            'label' => 'cruds.beneficiary.fields.floor_number',
            'isRequired' => false,
            'grid' => 'col-md-3',
            'value' => $beneficiary->floor_number ?? '',
        ])
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="step" value="basic_information">
        {{ trans('global.update') }}
    </button>
</form>
