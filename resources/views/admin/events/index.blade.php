@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <h3 class="panel-title">{{ __('app.users') }}</h3>
        <div class="buttons pull-right">
            <a class="btn btn-success" href="{{ route('events.create') }}">
                <i class="icon-plus"></i>
                {{ __('app.create_user') }}
            </a>
        </div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover data-table"
                   data-url="{{ route('events.data') }}"
                   data-columns-select='["title","start_date","duration","actions"]'
                   data-columns-ignore="[3]" data-export="true">
                <thead>
                <tr>

                    <th>{{ __('app.title') }}</th>
                    <th>{{ __('app.start_date') }}</th>
                    <th>{{ __('app.duration') }}</th>
                    <th class="actions width-md">{{ __('app.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>

                        <td>{{ $event->title }}</td>
                        <td>{{ $event->start_date }}</td>
                        <td>{{ $event->duration }}</td>

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