@if (Auth::guard('web')->check())
<ul class="dropdown-menu" role="menu">
    <li>
        <a href="{{ route('user.logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('user.logout') }}" method="GET" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
@endif
@if (Auth::guard('admin')->check())
<ul class="dropdown-menu" role="menu">
    <li>
        <a href="{{ route('admin.logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
@endif
