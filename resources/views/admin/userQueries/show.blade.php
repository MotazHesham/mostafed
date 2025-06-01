@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.userQuery.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-queries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.userQuery.fields.id') }}
                        </th>
                        <td>
                            {{ $userQuery->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userQuery.fields.question') }}
                        </th>
                        <td>
                            {{ $userQuery->question }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userQuery.fields.answer') }}
                        </th>
                        <td>
                            {{ $userQuery->answer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.userQuery.fields.user') }}
                        </th>
                        <td>
                            {{ $userQuery->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.user-queries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection