@extends('tenant.layouts.custom-master')

@php
    // Passing the bodyClass variable from the view to the layout
    $bodyClass = 'bg-white';
@endphp

@section('styles')
@endsection

@section('content')
    <div class="row authentication authentication-cover-main mx-0">
        <div class="col-xxl-8 col-xl-7">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-xxl-5 col-xl-9 col-lg-6 col-md-6 col-sm-8 col-12">
                    <div class="card custom-card my-4 border">
                        <div class="card-body p-5">
                            <p class="h5 mb-2 text-center">{{ trans('global.register_account') }}</p> 
                            <form method="POST" action="{{ route('beneficiary.register') }}">
                                @csrf
                                @if (session('message'))
                                    <div class="alert alert-info" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <label for="signin-name"
                                            class="form-label text-default">{{ trans('cruds.user.fields.name') }}</label>
                                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="signin-name"
                                            placeholder="{{ trans('cruds.user.fields.name') }}" required autocomplete="name"
                                            autofocus value="{{ old('name', null) }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span> 
                                            @enderror
                                    </div>
                                    <div class="col-xl-12">
                                        <label for="signin-identity-number"
                                            class="form-label text-default">{{ trans('cruds.user.fields.identity_num') }}</label>
                                        <input type="text" class="form-control {{ $errors->has('identity_num') ? ' is-invalid' : '' }}" name="identity_num" id="signin-identity-number"
                                            placeholder="{{ trans('cruds.user.fields.identity_num') }}" required autocomplete="identity_num"
                                            autofocus value="{{ old('identity_num', null) }}">
                                            @error('identity_num')
                                                <span class="text-danger">{{ $message }}</span> 
                                            @enderror
                                    </div>
                                    <div class="col-xl-12">
                                        <label for="signin-email"
                                            class="form-label text-default">{{ trans('cruds.user.fields.email') }}</label>
                                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="signin-email"
                                            placeholder="{{ trans('cruds.user.fields.email') }}" required autocomplete="email"
                                            autofocus value="{{ old('email', null) }}">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span> 
                                            @enderror
                                    </div>
                                    <div class="col-xl-12">
                                        <label for="signin-phone"
                                            class="form-label text-default">{{ trans('cruds.user.fields.phone') }}</label>
                                        <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="signin-phone"
                                            placeholder="{{ trans('cruds.user.fields.phone') }}" required autocomplete="phone"
                                            autofocus value="{{ old('phone', null) }}">
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span> 
                                            @enderror
                                    </div>
                                    <div class="col-xl-12 mb-2">
                                        <label for="signin-password" class="form-label text-default d-block">
                                            {{ trans('global.login_password') }}
                                        </label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control create-password-input"
                                                id="signin-password" name="password" required
                                                placeholder="{{ trans('global.login_password') }}">
                                            <a href="javascript:void(0);" class="show-password-button text-muted"
                                                onclick="createpassword('signin-password',this)" id="button-addon2"><i
                                                    class="ri-eye-off-line align-middle"></i></a>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span> 
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid mt-3">
                                    <button type="submit" class="btn btn-primary">{{ trans('global.register') }}</button>
                                    <p class="text-muted mt-3 mb-0 text-center">
                                        {{ trans('global.already_have_account') }}
                                        <a href="{{ route('login') }}"
                                            class="text-primary fw-medium">{{ trans('global.login') }}</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-xl-5 col-lg-12 d-xl-block d-none px-0">
            <div class="authentication-cover overflow-hidden">
                <div class="authentication-cover-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ global_asset('assets/logo-dark.png') }}" alt=""
                            class="authentication-brand desktop-white" style="height: 3.75rem !important">
                    </a>
                </div>
                <div class="aunthentication-cover-content d-flex align-items-center justify-content-center">
                    <div>
                        <img src="{{ global_asset('assets/login-cover.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Show Password JS -->
    <script src="{{ global_asset('assets/show-password.js') }}"></script>
@endsection
