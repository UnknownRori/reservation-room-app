<footer class="footer bg-dark p-3 pt-5">
    <div class="container">
        <div class="row text-white">
            <div class="col-md-4 my-2">
                <h3 class="text-warning">
                    HotelCompanyPlaceholder.
                </h3>
                <p>2022 &copy; HotelCompanyPlaceholder. All Right Reserved.</p>
            </div>
            <div class="col-md-4 my-2">
                <h3>Explore Us</h3>
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ route('home') }}"
                            class="{{ $title == 'Home' ? 'text-white' : 'text-secondary' }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('rooms.index') }}"
                            class="{{ $title == 'Our Rooms' ? 'text-white' : 'text-secondary' }}">Our Rooms</a>
                    </li>
                    <li>
                        <a href="{{ route('hotelfacility.index') }}"
                            class="{{ $title == 'Our Facilities' ? 'text-white' : 'text-secondary' }}">Our
                            Facilities</a>
                    </li>
                    <li>
                        <a href=# class="{{ $title == 'About us' ? 'text-white' : 'text-secondary' }}">About us</a>
                    </li>
                    <li>
                        <a href="#" class="{{ $title == 'Help & Support' ? 'text-white' : 'text-secondary' }}">Help &
                            Support</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 my-2">
                <h3>Customer Service</h3>
                <ul class="list-unstyled">
                    <li>
                        <a href="#" class="text-secondary">Privacy</a>
                    </li>
                    <li>
                        <a href="#" class="text-secondary">Term & Services</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}"
                            class="{{ $title == 'Create new user' ? 'text-white' : 'text-secondary' }}">Create new
                            account</a>
                    </li>
                    <li>
                        <a href="https://github.com/UnknownRori" class="text-secondary" target="_blank">Developer's
                            Github Account</a>
                    </li>
                    <li>
                        <a href="https://twitter.com/UnknownRori" class="text-secondary" target="_blank">Developer's
                            Twitter Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
