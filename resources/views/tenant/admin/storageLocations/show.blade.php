@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.storageLocation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.storage-locations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.storageLocation.fields.id') }}
                        </th>
                        <td>
                            {{ $storageLocation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.storageLocation.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\StorageLocation::TYPE_SELECT[$storageLocation->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.storageLocation.fields.code') }}
                        </th>
                        <td>
                            {{ $storageLocation->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.storageLocation.fields.name') }}
                        </th>
                        <td>
                            {{ $storageLocation->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.storageLocation.fields.description') }}
                        </th>
                        <td>
                            {{ $storageLocation->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.storageLocation.fields.parent') }}
                        </th>
                        <td>
                            {{ $storageLocation->parent->code ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-light mt-3 mb-3" href="{{ route('admin.storage-locations.index') }}">
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
            <a class="nav-link" href="#parent_storage_locations" role="tab" data-toggle="tab">
                {{ trans('cruds.storageLocation.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#storage_location_archives" role="tab" data-toggle="tab">
                {{ trans('cruds.archive.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="parent_storage_locations">
            @includeIf('admin.storageLocations.relationships.parentStorageLocations', ['storageLocations' => $storageLocation->parentStorageLocations])
        </div>
        <div class="tab-pane" role="tabpanel" id="storage_location_archives">
            @includeIf('admin.storageLocations.relationships.storageLocationArchives', ['archives' => $storageLocation->storageLocationArchives])
        </div>
    </div>
</div>

@endsection