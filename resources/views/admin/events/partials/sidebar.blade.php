<ul id="side-nav" class="main-menu navbar-collapse collapse">
    <li class="{{ Request::segment(2) == '' ? 'active' : '' }}">
        <a href="{{ route('main') }}">
            <i class="icon-gauge"></i>
            <span class="title">{{ __('app.main_page') }}</span>
        </a>
    </li>
    <li class="{{ Request::segment(2) == 'users' ? 'active' : '' }}">
        <a href="{{ route('users') }}">
            <i class="icon-users"></i>
            <span class="title">{{ __('app.user_management') }}</span>
        </a>
    </li>
    <li class="{{ Request::segment(2) == 'events' ? 'active' : '' }}">
        <a href="{{ route('users') }}">
            <i class="icon-events"></i>
            <span class="title">{{ __('app.event_management') }}</span>
        </a>
    </li>
</ul>