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
            <x-authentication-card>
                <x-slot name="title">{{ $title }}</x-slot>
            </x-authentication-card>
        </div>
    </div>
</nav>
