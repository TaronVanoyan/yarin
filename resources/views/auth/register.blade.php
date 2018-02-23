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
            <form method="post" action="{{ route('register') }}" class="form-validate">
                @csrf
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">{{ __('app.name') }}</label>
                    <input id="name" type="text" class="form-control required validate-min-length" data-min-length="2" name="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <small class="help-block">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">{{ __('app.email') }}</label>
                    <input id="email" type="email" class="form-control required" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <small class="help-block">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">{{ __('app.password') }}</label>
                    <input id="password" type="password" class="form-control required validate-min-length" data-min-length="6" name="password">
                    @if ($errors->has('password'))
                        <small class="help-block">{{ $errors->first('password') }}</small>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <label for="password-confirm">{{ __('app.password_confirm') }}</label>
                    <input id="password-confirm" type="password" class="form-control required validate-min-length" data-min-length="6" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <small class="help-block">{{ $errors->first('password_confirmation') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block">{{ __('app.registration') }}</button>
                </div>
                <p class="text-center"><a href="{{ route('login') }}">{{ __('app.back_to_login') }}</a></p>
            </form>
        </div>
    </div>
</div>
@endsection
