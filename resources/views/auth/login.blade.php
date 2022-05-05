@extends('layouts.register.main')

{{--@section('auth_header', __('adminlte.register_message'))--}}

@section('body')

    <div class="card card-outline card-primary p-3 m-4">
        <div class="register-logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('/assets/images/logo.png') }}" height="50">
                <b>Elmurod </b>NEWS
            </a>
        </div>

        <form action="{{ route('login') }}" method="post">
            @csrf

            {{-- Email field --}}
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" placeholder="{{ __('adminlte.email') }}">

                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                    </div>
                </div>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            {{-- Password field --}}
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                       placeholder="{{ __('adminlte.password') }}">

                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                    </div>
                </div>

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            {{-- Register button --}}
            <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                <span class="fas fa-user-plus"></span>
                {{ __('adminlte.sign_in') }}
            </button>

        </form>
    </div>
@stop

