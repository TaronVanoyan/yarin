
<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="image">{{ __('app.image') }}</label>
    @if(isset($image) && $image)
    <img src="{{asset("images")}}/{{$image->object_type}}s/{{$image->type}}s/{{$image->name}}?v={{time()}}">
    @endif
    <input id="image" type="file" class="form-control " name="image" value="{{ old('name') }}">
    @if ($errors->has('image'))
        <small class="help-block">{{ $errors->first('image') }}</small>
    @endif
</div>