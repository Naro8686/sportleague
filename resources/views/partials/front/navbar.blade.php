<ul class="navbar-nav">
    <li class="{{ (Request::is('/') ) ? 'current-menu-item' : '' }}"><a href="{{ route('home') }}">Home</a></li>
    <li class="{{ (Request::is('/login') ) ? 'current-menu-item' : '' }}"><a href="{{ route('login') }}">Login</a></li>
    <li class="{{ (Request::is('/register') ) ? 'current-menu-item' : '' }}"><a href="{{ route('register') }}">Register</a></li>
</ul>