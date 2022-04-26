<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container">
        <x-company-logo></x-company-logo>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ $title == 'Home' ? 'active' : '' }}">Home</a>
                </li>
                @if (Auth::user()->roles == 'admin')
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            Room
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('admin.rooms.index') }}"
                                class="dropdown-item {{ $title == 'Rooms List' ? 'active' : '' }}">Rooms List</a>
                            <a href="{{ route('admin.rooms.create') }}"
                                class="dropdown-item {{ $title == 'Create new room' ? 'active' : '' }}">Create
                                Room</a>
                        </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            Room Facility
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('admin.room.facility.index') }}"
                                class="dropdown-item {{ $title == 'Rooms Facility List' ? 'active' : '' }}">Rooms
                                Facility List</a>
                            <a href="{{ route('admin.room.facility.create') }}"
                                class="dropdown-item {{ $title == 'Create new room facility' ? 'active' : '' }}">Create
                                Room Facility</a>
                        </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            Room Type
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('admin.roomtype.index') }}"
                                class="dropdown-item {{ $title == 'Room Type List' ? 'active' : '' }}">Room
                                Type List</a>
                            <a href="{{ route('admin.roomtype.create') }}"
                                class="dropdown-item {{ $title == 'Create new room type' ? 'active' : '' }}">Create
                                Room Type</a>
                        </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            Hotel Facility
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('admin.facility.index') }}"
                                class="dropdown-item {{ $title == 'Hotel Facility List' ? 'active' : '' }}">Hotel
                                Facility List</a>
                            <a href="{{ route('admin.facility.create') }}"
                                class="dropdown-item {{ $title == 'Create new hotel facility' ? 'active' : '' }}">Create
                                Hotel Facility</a>
                        </div>
                    </li>
                @elseif(Auth::user()->roles == 'receptionist')
                    <li class="nav-item">
                        <a href="{{ route('receptionist.orders.index') }}"
                            class="nav-link {{ $title == 'Orders List' ? 'active' : '' }}">Orders List</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('receptionist.rooms.index') }}"
                            class="nav-link {{ $title == 'Rooms List' ? 'active' : '' }}">Room List</a>
                    </li>
                @endif
            </ul>
            <x-authentication-card>
                <x-slot name="title">{{ $title }}</x-slot>
            </x-authentication-card>
        </div>
    </div>
</nav>
