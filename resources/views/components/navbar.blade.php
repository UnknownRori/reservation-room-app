<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <a href="#app" class="navbar-brand">
            <h4 class="text-warning">
                HotelCompany
            </h4>
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ $title == 'Home' ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('rooms.index') }}"
                        class="nav-link {{ $title == 'Our Rooms' ? 'active' : '' }}">Our Rooms</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('hotelfacility.index') }}"
                        class="nav-link {{ $title == 'Our Facilities' ? 'active' : '' }}">Our Facilities</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ $title == 'About us' ? 'active' : '' }}">About
                        us</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link {{ $title == 'Help & Support' ? 'active' : '' }}">Help &
                        Support</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu">
                            @if (Auth::user()->roles == 'admin')
                                <a href="{{ route('admin.rooms.index') }}"
                                    class="dropdown-item {{ $title == 'Rooms List' ? 'active' : '' }}">Rooms List</a>
                                <a href="{{ route('admin.rooms.create') }}"
                                    class="dropdown-item {{ $title == 'Create new room' ? 'active' : '' }}">Create
                                    Room</a>
                                <a href="{{ route('admin.facility.index') }}"
                                    class="dropdown-item {{ $title == 'Hotel Facility List' ? 'active' : '' }}">Hotel
                                    Facility List</a>
                                <a href="{{ route('admin.facility.create') }}"
                                    class="dropdown-item {{ $title == 'Create new hotel facility' ? 'active' : '' }}">Create
                                    Hotel Facility</a>
                            @elseif (Auth::user()->roles == 'receptionist')
                                <a href="{{ route('receptionist.orders.index') }}"
                                    class="dropdown-item {{ $title == 'Orders List' ? 'active' : '' }}">Orders List</a>
                                <a href="{{ route('receptionist.rooms.index') }}"
                                    class="dropdown-item {{ $title == 'Rooms List' ? 'active' : '' }}">Rooms List</a>
                            @endif
                            <a href="{{ route('logout') }}"
                                class="dropdown-item {{ $title == '' ? 'active' : '' }}">Logout</a>
                        </div>
                    </li>
                @endauth
                @guest
                    <a href="{{ route('login') }}"
                        class="btn btn{{ $title == 'Login' ? '' : '-outline' }}-secondary mx-2">Login</a>
                    <a href="{{ route('register') }}"
                        class="btn btn{{ $title == 'Create new user' ? '' : '-outline' }}-secondary mx-2">Sign up</a>
                @endguest
            </ul>
        </div>
    </div>
</nav>
