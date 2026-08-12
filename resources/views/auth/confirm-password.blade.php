@extends('adminlte::master')

@section('adminlte_css')
    @yield('css')
@stop

@section('classes_body', 'lockscreen')

@section('body')
    <div class="lockscreen-wrapper">

        <div class="lockscreen-logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset(config('adminlte.logo_img')) }}" height="50">
                {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
            </a>
        </div>

        <div class="lockscreen-name">
            {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}
        </div>

        <div class="lockscreen-item">
            <form method="POST" action="{{ route('password.confirm') }}" class="lockscreen-credentials @if(! config('adminlte.usermenu_image')) ml-0 @endif">
                @csrf

                <div class="input-group">
                    <input id="password" type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="{{ __('adminlte::adminlte.password') }}" required autofocus>

                    <div class="input-group-append">
                        <button type="submit" class="btn">
                            <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @error('password')
            <div class="lockscreen-subitem text-center" role="alert">
                <b class="text-danger">{{ $message }}</b>
            </div>
        @enderror

        <div class="help-block text-center">
            {{ __('adminlte::adminlte.confirm_password_message') }}
        </div>

        <div class="text-center">
            <a href="{{ route('password.request') }}">
                {{ __('adminlte::adminlte.i_forgot_my_password') }}
            </a>
        </div>
    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
