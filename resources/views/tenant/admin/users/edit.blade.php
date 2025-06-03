@extends('tenant.layouts.master')
@section('content')
    @php

        $breadcrumbs = [
            ['title' => trans('cruds.userManagement.title'), 'url' => '#'],
            ['title' => trans('global.list') . ' ' . trans('cruds.user.title'), 'url' => '#'],
            ['title' => trans('global.edit') . ' ' . trans('cruds.user.title_singular'), 'url' => '#'],
        ];
    @endphp
    @include('tenant.partials.breadcrumb')

    <div class="card">
        <div class="card-header p-3">
            <h6 class="cart-title">
                {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
            </h6>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.update', [$user->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @include('utilities.form.text', [
                    'name' => 'name',
                    'label' => 'cruds.user.fields.name',
                    'isRequired' => true,
                    'value' => $user->name,
                ])
                @include('utilities.form.text', [
                    'name' => 'email',
                    'label' => 'cruds.user.fields.email',
                    'isRequired' => true,
                    'type' => 'email',
                    'value' => $user->email,
                ])
                @include('utilities.form.text', [
                    'name' => 'username',
                    'label' => 'cruds.user.fields.username',
                    'isRequired' => true,
                    'value' => $user->username,
                ])
                @include('utilities.form.text', [
                    'name' => 'phone',
                    'label' => 'cruds.user.fields.phone',
                    'isRequired' => true,
                    'value' => $user->phone,
                ])
                @include('utilities.form.text', [
                    'name' => 'phone_2',
                    'label' => 'cruds.user.fields.phone_2',
                    'isRequired' => true,
                    'value' => $user->phone_2,
                ])
                @include('utilities.form.text', [
                    'name' => 'identity_num',
                    'label' => 'cruds.user.fields.identity_num',
                    'isRequired' => true,
                    'value' => $user->identity_num,
                ])
                @include('utilities.form.text', [
                    'name' => 'password',
                    'label' => 'cruds.user.fields.password',
                    'isRequired' => false,
                    'type' => 'password',
                ])
                @include('utilities.form.multiselect', [
                    'name' => 'roles',
                    'label' => 'cruds.user.fields.roles',
                    'isRequired' => true,
                    'options' => $roles,
                    'value' => $user->roles->pluck('id')->toArray(),
                ])
                <div class="form-group">
                    <button class="btn btn-primary-light rounded-pill btn-wave" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
