<div class="row gy-4">
    @include('utilities.form.text', [
        'name' => 'incomes',
        'label' => 'cruds.beneficiary.fields.incomes',
        'isRequired' => true,
        'grid' => 'col-md-4',
    ])
    @include('utilities.form.text', [
        'name' => 'expenses',
        'label' => 'cruds.beneficiary.fields.expenses',
        'isRequired' => true,
        'grid' => 'col-md-4',
    ])
</div>
