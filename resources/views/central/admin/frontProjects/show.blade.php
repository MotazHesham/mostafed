@extends('central.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.frontProject.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.front-projects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.frontProject.fields.id') }}
                        </th>
                        <td>
                            {{ $frontProject->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frontProject.fields.title') }}
                        </th>
                        <td>
                            {{ $frontProject->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frontProject.fields.description') }}
                        </th>
                        <td>
                            {{ $frontProject->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frontProject.fields.image') }}
                        </th>
                        <td>
                            @if($frontProject->image)
                                <a href="{{ $frontProject->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $frontProject->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.front-projects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection