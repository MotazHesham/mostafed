@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.beneficiary.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.beneficiaries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.beneficiary.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nationality_id">{{ trans('cruds.beneficiary.fields.nationality') }}</label>
                <select class="form-control select2 {{ $errors->has('nationality') ? 'is-invalid' : '' }}" name="nationality_id" id="nationality_id">
                    @foreach($nationalities as $id => $entry)
                        <option value="{{ $id }}" {{ old('nationality_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('nationality'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nationality') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.nationality_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="marital_status_id">{{ trans('cruds.beneficiary.fields.marital_status') }}</label>
                <select class="form-control select2 {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" name="marital_status_id" id="marital_status_id">
                    @foreach($marital_statuses as $id => $entry)
                        <option value="{{ $id }}" {{ old('marital_status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('marital_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marital_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.marital_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="job_type_id">{{ trans('cruds.beneficiary.fields.job_type') }}</label>
                <select class="form-control select2 {{ $errors->has('job_type') ? 'is-invalid' : '' }}" name="job_type_id" id="job_type_id">
                    @foreach($job_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('job_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('job_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.job_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="educational_qualification_id">{{ trans('cruds.beneficiary.fields.educational_qualification') }}</label>
                <select class="form-control select2 {{ $errors->has('educational_qualification') ? 'is-invalid' : '' }}" name="educational_qualification_id" id="educational_qualification_id">
                    @foreach($educational_qualifications as $id => $entry)
                        <option value="{{ $id }}" {{ old('educational_qualification_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('educational_qualification'))
                    <div class="invalid-feedback">
                        {{ $errors->first('educational_qualification') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.educational_qualification_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="dob">{{ trans('cruds.beneficiary.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob') }}">
                @if($errors->has('dob'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dob') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.beneficiary.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="latitude">{{ trans('cruds.beneficiary.fields.latitude') }}</label>
                <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="text" name="latitude" id="latitude" value="{{ old('latitude', '') }}">
                @if($errors->has('latitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('latitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.latitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="longitude">{{ trans('cruds.beneficiary.fields.longitude') }}</label>
                <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="text" name="longitude" id="longitude" value="{{ old('longitude', '') }}">
                @if($errors->has('longitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('longitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.longitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="district_id">{{ trans('cruds.beneficiary.fields.district') }}</label>
                <select class="form-control select2 {{ $errors->has('district') ? 'is-invalid' : '' }}" name="district_id" id="district_id">
                    @foreach($districts as $id => $entry)
                        <option value="{{ $id }}" {{ old('district_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('district'))
                    <div class="invalid-feedback">
                        {{ $errors->first('district') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.district_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="street">{{ trans('cruds.beneficiary.fields.street') }}</label>
                <input class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" type="text" name="street" id="street" value="{{ old('street', '') }}">
                @if($errors->has('street'))
                    <div class="invalid-feedback">
                        {{ $errors->first('street') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.street_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="building_number">{{ trans('cruds.beneficiary.fields.building_number') }}</label>
                <input class="form-control {{ $errors->has('building_number') ? 'is-invalid' : '' }}" type="text" name="building_number" id="building_number" value="{{ old('building_number', '') }}">
                @if($errors->has('building_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('building_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.building_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="floor_number">{{ trans('cruds.beneficiary.fields.floor_number') }}</label>
                <input class="form-control {{ $errors->has('floor_number') ? 'is-invalid' : '' }}" type="text" name="floor_number" id="floor_number" value="{{ old('floor_number', '') }}">
                @if($errors->has('floor_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('floor_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.floor_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="health_condition_id">{{ trans('cruds.beneficiary.fields.health_condition') }}</label>
                <select class="form-control select2 {{ $errors->has('health_condition') ? 'is-invalid' : '' }}" name="health_condition_id" id="health_condition_id">
                    @foreach($health_conditions as $id => $entry)
                        <option value="{{ $id }}" {{ old('health_condition_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('health_condition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('health_condition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.health_condition_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="disability_type_id">{{ trans('cruds.beneficiary.fields.disability_type') }}</label>
                <select class="form-control select2 {{ $errors->has('disability_type') ? 'is-invalid' : '' }}" name="disability_type_id" id="disability_type_id">
                    @foreach($disability_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('disability_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('disability_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('disability_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.disability_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.beneficiary.fields.can_work') }}</label>
                <select class="form-control {{ $errors->has('can_work') ? 'is-invalid' : '' }}" name="can_work" id="can_work">
                    <option value disabled {{ old('can_work', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Beneficiary::CAN_WORK_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('can_work', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('can_work'))
                    <div class="invalid-feedback">
                        {{ $errors->first('can_work') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.can_work_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="incomes">{{ trans('cruds.beneficiary.fields.incomes') }}</label>
                <textarea class="form-control {{ $errors->has('incomes') ? 'is-invalid' : '' }}" name="incomes" id="incomes">{{ old('incomes') }}</textarea>
                @if($errors->has('incomes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('incomes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.incomes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expenses">{{ trans('cruds.beneficiary.fields.expenses') }}</label>
                <textarea class="form-control {{ $errors->has('expenses') ? 'is-invalid' : '' }}" name="expenses" id="expenses">{{ old('expenses') }}</textarea>
                @if($errors->has('expenses'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expenses') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.expenses_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="specialist_id">{{ trans('cruds.beneficiary.fields.specialist') }}</label>
                <select class="form-control select2 {{ $errors->has('specialist') ? 'is-invalid' : '' }}" name="specialist_id" id="specialist_id">
                    @foreach($specialists as $id => $entry)
                        <option value="{{ $id }}" {{ old('specialist_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('specialist'))
                    <div class="invalid-feedback">
                        {{ $errors->first('specialist') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.beneficiary.fields.specialist_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection