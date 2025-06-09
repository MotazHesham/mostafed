<form action="{{ route('admin.beneficiaries.update', $beneficiary) }}" class="p-3" method="POST">
    @csrf
    @method('PUT')
    <ul class="list-group list-group-flush border rounded-3 mt-3 shadow-sm">
        <li class="list-group-item p-3"> 
            <div class="ribbon-2 ribbon-secondary ribbon-left">
                <span class="ribbon-text">{{ trans('cruds.beneficiary.form_steps.login_information') }}</span>
            </div>
            <div class="mt-5"> 
                @include('tenant.partials.beneficiaryForm.login-information')
            </div>
        </li>
    </ul>
    <ul class="list-group list-group-flush border rounded-3 mt-3 shadow-sm">
        <li class="list-group-item p-3">
            <div class="ribbon-2 ribbon-secondary ribbon-left">
                <span class="ribbon-text">{{ trans('cruds.beneficiary.form_steps.basic_information') }}</span>
            </div>
            <div class="mt-5">
                @include('tenant.partials.beneficiaryForm.basic-information')
            </div>
        </li>
    </ul>
    <ul class="list-group list-group-flush border rounded-3 mt-3 shadow-sm">
        <li class="list-group-item p-3">
            <div class="ribbon-2 ribbon-secondary ribbon-left">
                <span class="ribbon-text">{{ trans('cruds.beneficiary.form_steps.work_information') }}</span>
            </div>
            <div class="mt-5">
                @include('tenant.partials.beneficiaryForm.work-information')
            </div>
        </li>

    </ul>
    <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">
        {{ trans('global.update') }}
    </button>
</form>
