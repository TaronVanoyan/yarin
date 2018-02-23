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