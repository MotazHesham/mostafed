@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lettersOrganization.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.letters-organizations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.lettersOrganization.fields.id') }}
                        </th>
                        <td>
                            {{ $lettersOrganization->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lettersOrganization.fields.name') }}
                        </th>
                        <td>
                            {{ $lettersOrganization->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lettersOrganization.fields.contact_person') }}
                        </th>
                        <td>
                            {{ $lettersOrganization->contact_person }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lettersOrganization.fields.contact_phone') }}
                        </th>
                        <td>
                            {{ $lettersOrganization->contact_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lettersOrganization.fields.contact_email') }}
                        </th>
                        <td>
                            {{ $lettersOrganization->contact_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lettersOrganization.fields.address') }}
                        </th>
                        <td>
                            {{ $lettersOrganization->address }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.letters-organizations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection