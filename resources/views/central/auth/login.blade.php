@extends('central.layouts.custom-master')

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
                            <p class="h5 mb-2 text-center">Sign In</p>
                            <p class="text-muted mb-4 text-center">Let's get started</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                @if (session('message'))
                                    <div class="alert alert-info" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <label for="signin-username"
                                            class="form-label text-default">{{ trans('global.login_email') }}</label>
                                        <input type="text" class="form-control" name="email" id="signin-username"
                                            placeholder="{{ trans('global.login_email') }}" required autocomplete="email"
                                            autofocus value="{{ old('email', null) }}">
                                            @error('email')
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
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-grid mt-3">
                                    <button type="submit" class="btn btn-primary">{{ trans('global.login') }}</button>
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
                    <a href="{{ url('index') }}">
                        <img src="{{ asset('assets/logo-dark.png') }}" alt="" class="authentication-brand desktop-white"
                            style="height: 3.75rem !important">
                    </a>
                </div>
                <div class="aunthentication-cover-content d-flex align-items-center justify-content-center">
                    <div>
                        <img src="{{ asset('assets/login-cover2.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Show Password JS -->
    <script src="{{ asset('assets/js/show-password.js') }}"></script>
@endsection
