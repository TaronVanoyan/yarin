@if(isset($edit) && $edit)
<a class="btn btn-primary" href="{{ route($edit, $entity->id) }}">
    <i class="icon-pencil"></i>
    <span>{{ __('app.edit') }}</span>
</a>
@endif
@if(isset($delete) && $delete)
    <a class="btn btn-red delete-entity" data-action="{{ route($delete, $entity->id) }}" href="#">
        <i class="icon-cancel"></i>
        <span>{{ __('app.delete') }}</span>
    </a>
@endif
@if(isset($deacrivate) && $deacrivate)
    <a class="btn btn-@if($entity->status == 1){!! "black" !!}@else{!! "success" !!}@endif delete-entity" data-action="{{ route($deacrivate, $entity->id) }}" href="#">
        <i class="icon-cancel"></i>
        @if($entity->status == 1)
            <span>{{ __('app.deacrivate') }}</span>
        @else
            <span>{{ __('app.activate') }}</span>
        @endif
    </a>
@endif

@if(isset($submitions) && $submitions)
    <a class="btn btn-primary" href="{{ route($submitions, $entity->id) }}">
        <i class="icon-pencil"></i>
        <span>{{ __('event.submitions') }}</span>
    </a>
@endif