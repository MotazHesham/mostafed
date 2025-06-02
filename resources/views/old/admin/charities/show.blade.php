@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.charity.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.charities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.charity.fields.id') }}
                        </th>
                        <td>
                            {{ $charity->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.charity.fields.name') }}
                        </th>
                        <td>
                            {{ $charity->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.charity.fields.phone') }}
                        </th>
                        <td>
                            {{ $charity->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.charity.fields.address') }}
                        </th>
                        <td>
                            {{ $charity->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.charity.fields.logo') }}
                        </th>
                        <td>
                            @if($charity->logo)
                                <a href="{{ $charity->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $charity->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.charity.fields.domain') }}
                        </th>
                        <td>
                            {{ $charity->domain }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.charities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection