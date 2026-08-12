@extends('adminlte::auth.auth-page', ['authType' => 'login'])

@section('auth_header', __('adminlte::adminlte.verify_message'))

@section('auth_body')
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success" role="alert">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <p class="mb-4">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            {{ __('Resend Verification Email') }}
        </button>
    </form>
@stop

@section('auth_footer')
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
            {{ __('Log Out') }}
        </button>
    </form>
@stop
