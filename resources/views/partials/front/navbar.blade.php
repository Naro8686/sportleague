<ul class="navbar-nav">
    <li class="{{ (Request::is('/') ) ? 'current-menu-item' : '' }}"><a href="{{ route('home') }}">{{ _e('Home') }}</a></li>
    <li class="{{ (Request::is('races') ) ? 'current-menu-item' : '' }}"><a href="{{ route('races') }}">{{ _e('Races') }}</a></li>
    <li class="{{ (Request::is('faq') ) ? 'current-menu-item' : '' }}"><a href="{{ route('faq') }}">{{ _e('FAQ') }}</a></li>
    <li class="{{ (Request::is('contact') ) ? 'current-menu-item' : '' }}"><a href="{{ route('contact') }}">{{ _e('Contact') }}</a></li>
    @if(!Auth::check())
        <li class="{{ (Request::is('login') ) ? 'current-menu-item' : '' }}"><a href="{{ route('login') }}">{{ _e('Sign In') }}</a></li>
        <li class="{{ (Request::is('register') ) ? 'current-menu-item' : '' }}"><a href="{{ route('register') }}">{{ _e('Sign Up') }}</a></li>
    @else
    <li><a href="{{ route('admin.home') }}">{{ _e('Dashboard') }}</a></li>
    @endif
</ul>