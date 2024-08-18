<nav class="header_menu">
    <ul class="menu">
        <li class="{{ Request::is('/') ? 'current-menu-item' : ''}}">
            <a href="/">Home</a>
        </li>
        <li class="{{ Request::is('properties') ? 'current-menu-item' : ''}}">
            <a href="/properties#ourproperties">Our Properties</a>
        </li>
        <li class="{{ Request::is('restaurant*') ? 'current-menu-item' : ''}}">
            <a href="/restaurant#restaurant">Restaurant</a>
        </li>
        @if(auth()->user())
        <li class="{{ Request::is('request-pesanan*') ? 'current-menu-item' : ''}}">
            <a href="/request-pesanan">Request Pesanan</a>
        </li>
        @endif
        <li>
            <a href="#">Blog</a>

        </li>
        <li class="{{ Request::is('contact') ? 'current-menu-item' : ''}}">
            <a href="/contact#contact">Contact</a>
        </li>
    </ul>
</nav>
