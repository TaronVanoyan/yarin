@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">{{ __('app.edit_event') }}</h3>
            </div>
            <div class="panel-body">
                {{--@include("common.imageuploader")--}}
                <form action="{{ route('events.update', $entity->id) }}" method="post" class="form-validate" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            @include("common.imageuploader",['image' => $entity->thumbnail])
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                <label for="title">{{ __('event.title') }}</label>
                                <input id="title" type="text" class="form-control required validate-min-length" data-min-length="2" name="title" value="{{ $entity->title }}" required autofocus>
                                @if ($errors->has('title'))
                                    <small class="help-block">{{ $errors->first('title') }}</small>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('sub_title1') ? 'has-error' : '' }}">
                                <label for="sub_title1" class="">{{ __('event.sub_title1') }}</label>
                                <input id="sub_title1" type="text" class="form-control validate-min-length" data-min-length="6" name="sub_title1" value="{{ $entity->sub_title1 }}">
                                @if ($errors->has('sub_title1'))
                                    <small class="help-block">{{ $errors->first('sub_title1') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('sub_title2') ? 'has-error' : '' }}">
                                <label for="sub_title2" class="">{{ __('app.sub_title2') }}</label>
                                <input id="sub_title2" type="text" class="form-control required" name="sub_title2" value="{{$entity->sub_title2}}">
                                @if ($errors->has('sub_title2'))
                                    <small class="help-block">{{ $errors->first('sub_title2') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('syllabus') ? 'has-error' : '' }}">
                                <label for="syllabus" class="">{{ __('event.syllabus') }}</label>
                                <input id="syllabus" type="text" class="form-control validate-min-length" data-min-length="6" name="syllabus" value="{{ $entity->syllabus }}">
                                @if ($errors->has('syllabus'))
                                    <small class="help-block">{{ $errors->first('syllabus') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                                <label class="radio-inline"><input type="radio" name="type" value="0" @if($entity->type == 0)checked="checked"@endif>{{ __('event.practical') }}</label>
                                <label class="radio-inline"><input type="radio" name="type" value="1" @if($entity->type == 1)checked="checked"@endif>{{ __('event.teory') }}</label>
                                @if ($errors->has('type'))
                                    <small class="help-block">{{ $errors->first('type') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label for="description" class="">{{ __('event.description') }}</label>
                                <textarea id="description" type="text" class="form-control validate-min-length" data-min-length="6" name="description" >{{ $entity->description }}</textarea>
                                @if ($errors->has('description'))
                                    <small class="help-block">{{ $errors->first('description') }}</small>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">

                            <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
                                <label for="start_date" class="">{{ __('event.start_date') }}</label>
                                <input id="start_date" type="text" class="form-control validate-min-length" data-min-length="6" name="start_date" value="{{ $entity->start_date }}">
                                @if ($errors->has('start_date'))
                                    <small class="help-block">{{ $errors->first('start_date') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
                                <label for="end_date" class="">{{ __('event.end_date') }}</label>
                                <input id="end_date" type="text" class="form-control validate-min-length" data-min-length="6" name="end_date" value="{{ $entity->end_date }}">
                                @if ($errors->has('end_date'))
                                    <small class="help-block">{{ $errors->first('end_date') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('cost') ? 'has-error' : '' }}">
                                <label for="cost" class="">{{ __('event.cost') }}</label>
                                <input id="cost" type="text" class="form-control validate-min-length" data-min-length="6" name="cost" value="{{ $entity->cost }}">
                                @if ($errors->has('cost'))
                                    <small class="help-block">{{ $errors->first('cost') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('audience') ? 'has-error' : '' }}">
                                <label for="audience" class="">{{ __('event.audience') }}</label>
                                <input id="audience" type="text" class="form-control validate-min-length" data-min-length="6" name="audience" value="{{ $entity->audience }}">
                                @if ($errors->has('audience'))
                                    <small class="help-block">{{ $errors->first('audience') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('duration') ? 'has-error' : '' }}">
                                <label for="duration" class="">{{ __('event.duration') }}</label>
                                <input id="duration" type="number" class="form-control validate-min-length" data-min-length="6" name="duration" value="{{ $entity->duration }}">
                                @if ($errors->has('duration'))
                                    <small class="help-block">{{ $errors->first('duration') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
                                <label for="comment" class="">{{ __('event.comment') }}</label>
                                <textarea id="comment" type="text" class="form-control validate-min-length" data-min-length="6" name="comment" >{{ $entity->comment }}</textarea>
                                @if ($errors->has('comment'))
                                    <small class="help-block">{{ $errors->first('comment') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('teacher') ? 'has-error' : '' }}">
                                <label for="teacher" class="">{{ __('event.teacher') }}</label>
                                <select id="teacher"  class="form-control validate-min-length" data-min-length="6" name="teacher_id">
                                    <option value="0" @if($entity->teacher_id == 0)selected="selected"@endif>{{__(__("app.select_option"))}}</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}" @if($entity->teacher_id == $teacher->id)selected="selected"@endif>{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('teacher'))
                                    <small class="help-block">{{ $errors->first('teacher') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('event_type') ? 'has-error' : '' }}">
                                <label for="event_type" class="">{{ __('event.event_type') }}</label>
                                <select id="event_type" type="text" class="form-control validate-min-length" data-min-length="6" name="event_type" >
                                    <option value="0" @if($entity->event_type == 0)selected="selected"@endif>{{__(__("app.select_option"))}}</option>
                                    @foreach($event_types as $type)
                                        <option value="{{$type->id}}" @if($entity->event_type == $type->id)selected="selected"@endif>{{$type->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('event_type'))
                                    <small class="help-block">{{ $errors->first('event_type') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group {{ $errors->has('feauture_event') ? 'has-error' : '' }}">
                                <label for="feauture_event" class="">{{ __('event.feauture_event') }}</label>
                                <input type="hidden" name="feauture_event" value="0">
                                <input id="feauture_event" type="checkbox" class="form-control validate-min-length" name="feauture_event" value="1" @if($entity->feauture_event ==1)checked="checked"@endif>
                                @if ($errors->has('feauture_event'))
                                    <small class="help-block">{{ $errors->first('feauture_event') }}</small>
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
@push('styles')

    <link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
@endpush

@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    <script src="{{asset("js/i18n/custom.js")}}"></script>
@endpush