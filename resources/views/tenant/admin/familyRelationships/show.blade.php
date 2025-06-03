@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.familyRelationship.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.family-relationships.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.familyRelationship.fields.id') }}
                        </th>
                        <td>
                            {{ $familyRelationship->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.familyRelationship.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\FamilyRelationship::GENDER_RADIO[$familyRelationship->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.familyRelationship.fields.name') }}
                        </th>
                        <td>
                            {{ $familyRelationship->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.family-relationships.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection