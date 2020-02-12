<ul class="navbar-nav">
    <li class="{{ (Request::is('/') ) ? 'current-menu-item' : '' }}"><a href="{{ route('home') }}">Home</a></li>
    <li class="{{ (Request::is('races') ) ? 'current-menu-item' : '' }}"><a href="{{ route('races') }}">Races</a></li>
    <li class="{{ (Request::is('contact') ) ? 'current-menu-item' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
</ul>