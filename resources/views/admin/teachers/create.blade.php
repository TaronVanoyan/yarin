@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">{{ __('app.create_user') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('teachers.store') }}" method="post" class="form-validate" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                @include("common.imageuploader")
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name" class="">{{ __('app.name') }}</label>
                                    <input id="name" type="text" class="form-control required" name="name" value="{{old('name') }}">
                                    @if ($errors->has('name'))
                                        <small class="help-block">{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
                                    <label for="position" class="">{{ __('app.position') }}</label>
                                    <input id="position" type="text" class="form-control required" name="position" value="{{old('position') }}">
                                    @if ($errors->has('position'))
                                        <small class="help-block">{{ $errors->first('position') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group {{ $errors->has('guest') ? 'has-error' : '' }}">
                                    <label for="guest" class="">{{ __('app.guest') }}</label>
                                    <input type="hidden" name="guest" value="0">
                                    <input id="guest" type="checkbox" class="form-control" name="guest" value="1" @if(old('guest') == 1)checked="checked"@endif>
                                    @if ($errors->has('guest'))
                                        <small class="help-block">{{ $errors->first('guest') }}</small>
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