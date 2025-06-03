@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.beneficiaryFamily.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.beneficiary-families.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.id') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.beneficiary') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->beneficiary->dob ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.name') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\BeneficiaryFamily::GENDER_SELECT[$beneficiaryFamily->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.dob') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->dob }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.phone') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.email') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.family_relationship') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->family_relationship->gender ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.marital_status') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->marital_status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.health_condition') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->health_condition->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.disability_type') }}
                        </th>
                        <td>
                            {{ $beneficiaryFamily->disability_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.can_work') }}
                        </th>
                        <td>
                            {{ App\Models\BeneficiaryFamily::CAN_WORK_SELECT[$beneficiaryFamily->can_work] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryFamily.fields.photo') }}
                        </th>
                        <td>
                            @if($beneficiaryFamily->photo)
                                <a href="{{ $beneficiaryFamily->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $beneficiaryFamily->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.beneficiary-families.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection