<ul class="navbar-nav ml-auto">
    @auth
        <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu">
                <a href="{{ route('user.order.history') }}" class="dropdown-item">History</a>
                @if (Auth::user()->roles == 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                        class="dropdown-item {{ $title == 'Dashboard' ? 'active' : '' }}">Dashboard</a>
                    <div class="dropdown-divider"></div>
                @elseif (Auth::user()->roles == 'receptionist')
                    <a href="{{ route('receptionist.dashboard') }}"
                        class="dropdown-item {{ $title == 'Dashboard' ? 'active' : '' }}">Dashboard</a>
                    <div class="dropdown-divider"></div>
                @endif

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" value="Logout" class="dropdown-item">
                </form>
            </div>
        </li>
    @endauth
    @guest
        <a href="{{ route('login') }}" class="btn btn{{ $title == 'Login' ? '' : '-outline' }}-secondary mx-2">Login</a>
        <a href="{{ route('register') }}"
            class="btn btn{{ $title == 'Create new user' ? '' : '-outline' }}-secondary mx-2">Sign up</a>
    @endguest
</ul>
