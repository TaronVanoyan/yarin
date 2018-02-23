@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h3 class="panel-title">{{ __('app.users') }}</h3>
        <div class="buttons pull-right">
            <a class="btn btn-success" href="{{ route('teachers.create') }}">
                <i class="icon-plus"></i>
                {{ __('app.create_teacher ') }}
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover data-table"
                   data-url="{{ route('teachers.data') }}"
                   data-columns-select='["name","position","guest","created_at","actions"]'
                   data-columns-ignore="[4]" data-export="true">
                <thead>
                <tr>
                    <th>{{ __('app.name') }}</th>
                    <th>{{ __('app.position') }}</th>
                    <th>{{ __('app.guest') }}</th>
                    <th>{{ __('app.created_at') }}</th>
                    <th class="actions width-md">{{ __('app.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->position }}</td>
                        <td>{{ $teacher->guest }}</td>
                        <td>{{ $teacher->created_at }}</td>
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