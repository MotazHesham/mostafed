@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.district.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.districts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.district.fields.id') }}
                        </th>
                        <td>
                            {{ $district->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.district.fields.name') }}
                        </th>
                        <td>
                            {{ $district->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.districts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection