@if(Request::is('/'))
    @include('partials.front.home-header')
@else
    @include('partials.front.header')
@endif

@yield('content')

@include('partials.front.footer')