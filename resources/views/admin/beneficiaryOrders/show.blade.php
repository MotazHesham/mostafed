@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.beneficiaryOrder.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiary-orders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.id') }}
                        </th>
                        <td>
                            {{ $beneficiaryOrder->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.beneficiary') }}
                        </th>
                        <td>
                            {{ $beneficiaryOrder->beneficiary->dob ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.service_type') }}
                        </th>
                        <td>
                            {{ App\Models\BeneficiaryOrder::SERVICE_TYPE_SELECT[$beneficiaryOrder->service_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.service') }}
                        </th>
                        <td>
                            {{ $beneficiaryOrder->service->type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.description') }}
                        </th>
                        <td>
                            {{ $beneficiaryOrder->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.attachment') }}
                        </th>
                        <td>
                            @if($beneficiaryOrder->attachment)
                                <a href="{{ $beneficiaryOrder->attachment->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.status') }}
                        </th>
                        <td>
                            {{ $beneficiaryOrder->status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.accept_status') }}
                        </th>
                        <td>
                            {{ App\Models\BeneficiaryOrder::ACCEPT_STATUS_RADIO[$beneficiaryOrder->accept_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.note') }}
                        </th>
                        <td>
                            {{ $beneficiaryOrder->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.refused_reason') }}
                        </th>
                        <td>
                            {{ $beneficiaryOrder->refused_reason }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.done') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $beneficiaryOrder->done ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.specialist') }}
                        </th>
                        <td>
                            {{ $beneficiaryOrder->specialist->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.beneficiaryOrder.fields.is_archived') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $beneficiaryOrder->is_archived ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.beneficiary-orders.index') }}">
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
            <a class="nav-link" href="#beneficiary_followup_beneficiary_order_followups" role="tab" data-toggle="tab">
                {{ trans('cruds.beneficiaryOrderFollowup.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="beneficiary_followup_beneficiary_order_followups">
            @includeIf('admin.beneficiaryOrders.relationships.beneficiaryFollowupBeneficiaryOrderFollowups', ['beneficiaryOrderFollowups' => $beneficiaryOrder->beneficiaryFollowupBeneficiaryOrderFollowups])
        </div>
    </div>
</div>

@endsection