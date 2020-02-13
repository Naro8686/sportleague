<ul class="navbar-nav">
    <li class="{{ (Request::is('/') ) ? 'current-menu-item' : '' }}"><a href="{{ route('home') }}">Home</a></li>
    <li class="{{ (Request::is('races') ) ? 'current-menu-item' : '' }}"><a href="{{ route('races') }}">Races</a></li>
    <li class="{{ (Request::is('contact') ) ? 'current-menu-item' : '' }}"><a href="{{ route('contact') }}">Contact</a></li>
    @if(!Auth::check())
        <li class="{{ (Request::is('login') ) ? 'current-menu-item' : '' }}"><a href="{{ route('login') }}">Sign In</a></li>
        <li class="{{ (Request::is('register') ) ? 'current-menu-item' : '' }}"><a href="{{ route('register') }}">Sign Up</a></li>
    @endif
</ul>