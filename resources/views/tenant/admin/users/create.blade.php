@extends('tenant.layouts.master')
@section('content')
    @php
        $breadcrumbs = [
            ['title' => trans('cruds.userManagement.title'), 'url' => '#'],
            ['title' => trans('global.list') . ' ' . trans('cruds.user.title'), 'url' => '#'],
            ['title' => trans('global.create') . ' ' . trans('cruds.user.title_singular'), 'url' => '#'],
        ];
    @endphp
    @include('tenant.partials.breadcrumb')

    <div class="card">
        <div class="card-header p-3">
            <h6 class="cart-title"> 
                {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
            </h6>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                @csrf
                @include('utilities.form.text', [
                    'name' => 'name',
                    'label' => 'cruds.user.fields.name',
                    'isRequired' => true,
                ])
                @include('utilities.form.text', [
                    'name' => 'email',
                    'label' => 'cruds.user.fields.email',
                    'isRequired' => true,
                    'type' => 'email',
                ])
                @include('utilities.form.text', [
                    'name' => 'username',
                    'label' => 'cruds.user.fields.username',
                    'isRequired' => true,
                ])
                @include('utilities.form.text', [
                    'name' => 'phone',
                    'label' => 'cruds.user.fields.phone',
                    'isRequired' => true,
                ])
                @include('utilities.form.text', [
                    'name' => 'phone_2',
                    'label' => 'cruds.user.fields.phone_2',
                    'isRequired' => true,
                ])
                @include('utilities.form.text', [
                    'name' => 'identity_num',
                    'label' => 'cruds.user.fields.identity_num',
                    'isRequired' => true,
                ])
                @include('utilities.form.text', [
                    'name' => 'password',
                    'label' => 'cruds.user.fields.password',
                    'isRequired' => true,
                    'type' => 'password',
                ])
                @include('utilities.form.multiselect2', [
                    'name' => 'roles',
                    'label' => 'cruds.user.fields.roles',
                    'isRequired' => true,
                    'options' => $roles,
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
