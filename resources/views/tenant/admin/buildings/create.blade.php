@extends('tenant.layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.building.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.buildings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.building.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number_of_floors">{{ trans('cruds.building.fields.number_of_floors') }}</label>
                <input class="form-control {{ $errors->has('number_of_floors') ? 'is-invalid' : '' }}" type="number" name="number_of_floors" id="number_of_floors" value="{{ old('number_of_floors', '') }}" step="1" required>
                @if($errors->has('number_of_floors'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number_of_floors') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.number_of_floors_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number_of_apartments">{{ trans('cruds.building.fields.number_of_apartments') }}</label>
                <input class="form-control {{ $errors->has('number_of_apartments') ? 'is-invalid' : '' }}" type="number" name="number_of_apartments" id="number_of_apartments" value="{{ old('number_of_apartments', '') }}" step="1" required>
                @if($errors->has('number_of_apartments'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number_of_apartments') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.number_of_apartments_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.building.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" required>{{ old('address') }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="latitude">{{ trans('cruds.building.fields.latitude') }}</label>
                <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="text" name="latitude" id="latitude" value="{{ old('latitude', '') }}">
                @if($errors->has('latitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('latitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.latitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="longitude">{{ trans('cruds.building.fields.longitude') }}</label>
                <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="text" name="longitude" id="longitude" value="{{ old('longitude', '') }}">
                @if($errors->has('longitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('longitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.longitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="apartment_specifications">{{ trans('cruds.building.fields.apartment_specifications') }}</label>
                <textarea class="form-control {{ $errors->has('apartment_specifications') ? 'is-invalid' : '' }}" name="apartment_specifications" id="apartment_specifications" required>{{ old('apartment_specifications') }}</textarea>
                @if($errors->has('apartment_specifications'))
                    <div class="invalid-feedback">
                        {{ $errors->first('apartment_specifications') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.apartment_specifications_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="support_services">{{ trans('cruds.building.fields.support_services') }}</label>
                <textarea class="form-control {{ $errors->has('support_services') ? 'is-invalid' : '' }}" name="support_services" id="support_services">{{ old('support_services') }}</textarea>
                @if($errors->has('support_services'))
                    <div class="invalid-feedback">
                        {{ $errors->first('support_services') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.building.fields.support_services_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-primary-light rounded-pill btn-wave" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection