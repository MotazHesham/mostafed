@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.beneficiary.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.id') }}
                        </th>
                        <td>
                            {{ $beneficiary->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.user') }}
                        </th>
                        <td>
                            {{ $beneficiary->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.nationality') }}
                        </th>
                        <td>
                            {{ $beneficiary->nationality->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.marital_status') }}
                        </th>
                        <td>
                            {{ $beneficiary->marital_status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.job_type') }}
                        </th>
                        <td>
                            {{ $beneficiary->job_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.educational_qualification') }}
                        </th>
                        <td>
                            {{ $beneficiary->educational_qualification->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.dob') }}
                        </th>
                        <td>
                            {{ $beneficiary->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.address') }}
                        </th>
                        <td>
                            {{ $beneficiary->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.latitude') }}
                        </th>
                        <td>
                            {{ $beneficiary->latitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.longitude') }}
                        </th>
                        <td>
                            {{ $beneficiary->longitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.district') }}
                        </th>
                        <td>
                            {{ $beneficiary->district->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.street') }}
                        </th>
                        <td>
                            {{ $beneficiary->street }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.building_number') }}
                        </th>
                        <td>
                            {{ $beneficiary->building_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.floor_number') }}
                        </th>
                        <td>
                            {{ $beneficiary->floor_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.health_condition') }}
                        </th>
                        <td>
                            {{ $beneficiary->health_condition->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.disability_type') }}
                        </th>
                        <td>
                            {{ $beneficiary->disability_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.can_work') }}
                        </th>
                        <td>
                            {{ App\Models\Beneficiary::CAN_WORK_SELECT[$beneficiary->can_work] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.incomes') }}
                        </th>
                        <td>
                            {{ $beneficiary->incomes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.expenses') }}
                        </th>
                        <td>
                            {{ $beneficiary->expenses }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.is_archived') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $beneficiary->is_archived ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiary.fields.specialist') }}
                        </th>
                        <td>
                            {{ $beneficiary->specialist->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#beneficiary_beneficiary_orders" role="tab" data-toggle="tab">
                {{ trans('cruds.beneficiaryOrder.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="beneficiary_beneficiary_orders">
            @includeIf('admin.beneficiaries.relationships.beneficiaryBeneficiaryOrders', ['beneficiaryOrders' => $beneficiary->beneficiaryBeneficiaryOrders])
        </div>
    </div>
</div>

@endsection