@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.frontPartner.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.front-partners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.frontPartner.fields.id') }}
                        </th>
                        <td>
                            {{ $frontPartner->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frontPartner.fields.name') }}
                        </th>
                        <td>
                            {{ $frontPartner->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.frontPartner.fields.image') }}
                        </th>
                        <td>
                            @if($frontPartner->image)
                                <a href="{{ $frontPartner->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $frontPartner->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.front-partners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection