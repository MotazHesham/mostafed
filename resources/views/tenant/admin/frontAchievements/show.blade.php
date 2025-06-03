@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.frontAchievement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.front-achievements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.frontAchievement.fields.id') }}
                        </th>
                        <td>
                            {{ $frontAchievement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frontAchievement.fields.icon') }}
                        </th>
                        <td>
                            {{ $frontAchievement->icon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frontAchievement.fields.icon_color') }}
                        </th>
                        <td>
                            {{ $frontAchievement->icon_color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frontAchievement.fields.title') }}
                        </th>
                        <td>
                            {{ $frontAchievement->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frontAchievement.fields.achievement') }}
                        </th>
                        <td>
                            {{ $frontAchievement->achievement }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.front-achievements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection