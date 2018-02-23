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
            <form method="post" action="{{ route('login') }}" class="form-validate">
                @csrf
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">{{ __('app.email') }}</label>
                    <input id="email" type="email" class="form-control required" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <small class="help-block">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">{{ __('app.password') }}</label>
                    <input id="password" type="password" class="form-control required" name="password">
                    @if ($errors->has('password'))
                        <small class="help-block">{{ $errors->first('password') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <div class="checkbox checkbox-replace">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">{{ __('app.remember_me') }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">{{ __('app.login') }}</button>
                </div>
                <p class="text-center"><a href="{{ route('password.request') }}">{{ __('app.forgot_your_password') }}</a></p>
            </form>
        </div>
    </div>
</div>
@endsection
