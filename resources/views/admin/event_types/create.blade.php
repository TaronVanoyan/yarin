@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title">{{ __('app.add_event_type') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('event.types.store') }}" method="post" class="form-validate">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">{{ __('app.event_type') }}</label>
                                    <input id="name" type="text" class="form-control required validate-min-length" data-min-length="2" name="name" value="{{ old("name")}}" required autofocus>
                                    @if ($errors->has('name'))
                                        <small class="help-block">{{ $errors->first('name') }}</small>
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