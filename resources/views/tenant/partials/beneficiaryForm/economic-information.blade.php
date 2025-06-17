<form method="POST" action="{{ route('admin.beneficiaries.update', $beneficiary->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row gy-4">
        <div class="col-md-6">
            <h5 class="mb-3">{{ trans('cruds.beneficiary.fields.incomes') }}</h5>
            <div class="row">
                @foreach ($incomes as $income)
                    @include('utilities.form.text', [
                        'name' => 'incomes[' . $income->id . ']',
                        'label' => $income->name,
                        'isRequired' => $income->is_required,
                        'grid' => 'col-md-6',
                        'type' => $income->data_type,
                        'value' =>
                            $beneficiary->incomes && json_decode($beneficiary->incomes)
                                ? json_decode($beneficiary->incomes)->{$income->id}
                                : null,
                        'helperBlock' => '',
                    ])
                @endforeach
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="mb-3">{{ trans('cruds.beneficiary.fields.expenses') }}</h5>
            <div class="row">
                @foreach ($expenses as $expense)
                    @include('utilities.form.text', [
                        'name' => 'expenses[' . $expense->id . ']',
                        'label' => $expense->name,
                        'isRequired' => $expense->is_required,
                        'grid' => 'col-md-6',
                        'type' => $expense->data_type,
                        'value' =>
                            $beneficiary->expenses && json_decode($beneficiary->expenses)
                                ? json_decode($beneficiary->expenses)->{$expense->id}
                                : null,
                        'helperBlock' => '',
                    ])
                @endforeach
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3" name="step" value="economic_information">
        {{ trans('global.update') }}
    </button>
</form>
