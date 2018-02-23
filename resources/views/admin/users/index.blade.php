@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h3 class="panel-title">{{ __('app.users') }}</h3>
        <div class="buttons pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}">
                <i class="icon-plus"></i>
                {{ __('app.create_user') }}
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover data-table"
                   data-url="{{ route('users.data') }}"
                   data-columns-select='["id","name","email","created_at","updated_at","actions"]'
                   data-columns-ignore="[5]" data-export="true">
                <thead>
                <tr>
                    <th class="width-xxs">#</th>
                    <th>{{ __('app.name') }}</th>
                    <th>{{ __('app.email') }}</th>
                    <th>{{ __('app.created_at') }}</th>
                    <th>{{ __('app.updated_at') }}</th>
                    <th class="actions width-md">{{ __('app.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{ asset('base/js/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('base/js/plugins/dataTables/datatables.min.js') }}"></script>
@endpush