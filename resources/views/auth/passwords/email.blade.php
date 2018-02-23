@extends('layouts.auth')

@section('content')
<div class="z-index-50">
    <div class="login-container">
        <div class="login-content">
            <div class="login-branding">
                <a href="{{ route('main') }}"><img src="{{ asset('base/images/logo.png') }}" alt="{{ config('app.name', 'Laravel') }}" title="{{ config('app.name', 'Laravel') }}"></a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form method="post" action="{{ route('password.email') }}" class="form-validate">
                @csrf
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">{{ __('app.email') }}</label>
                    <input id="email" type="email" class="form-control required" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <small class="help-block">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">{{ __('app.send_reset_password_email') }}</button>
                </div>
                <p class="text-center"><a href="{{ route('login') }}">{{ __('app.back_to_login') }}</a></p>
            </form>
        </div>
    </div>
</div>
@endsection
