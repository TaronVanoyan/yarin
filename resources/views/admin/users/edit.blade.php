@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">{{ __('app.edit_user') }}</h3>
            </div>
            <div class="panel-body">
                <form action="{{ route('users.update', $entity->id) }}" method="post" class="form-validate">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name">{{ __('app.name') }}</label>
                                <input id="name" type="text" class="form-control required validate-min-length" data-min-length="2" name="name" value="{{ $entity->name }}" required autofocus>
                                @if ($errors->has('name'))
                                    <small class="help-block">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email" class="">{{ __('app.email') }}</label>
                                <input id="email" type="email" class="form-control required" name="email" value="{{ $entity->email }}">
                                @if ($errors->has('email'))
                                    <small class="help-block">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password" class="">{{ __('app.password') }}</label>
                                <input id="password" type="password" class="form-control validate-min-length" data-min-length="6" name="password">
                                @if ($errors->has('password'))
                                    <small class="help-block">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <label for="password-confirm" class="">{{ __('app.password_confirm') }}</label>
                                <input id="password-confirm" type="password" class="form-control required" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <small class="help-block">{{ $errors->first('password_confirmation') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">{{ __('app.submission') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection