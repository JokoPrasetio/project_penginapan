<nav class="header_menu">
    <ul class="menu">
        <li class="{{ Request::is('/') ? 'current-menu-item' : ''}}">
            <a href="/">Home</a>
        </li>
        <li class="{{ Request::is('properties') ? 'current-menu-item' : ''}}">
            <a href="/properties">Our Properties</a>
        </li>
        <li>
            <a href="#">Restaurant</a>

        </li>
        <li>
            <a href="#">Blog <span class="fa fa-caret-down"></span></a>
            <ul class="sub-menu">
                <li><a href="blog.html">Blog</a></li>
                <li><a href="blog-detail.html">Blog Detail</a></li>
                <li><a href="blog-detail-fullwidth.html">Blog Detail Fullwidth</a></li>
            </ul>
        </li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
</nav>
