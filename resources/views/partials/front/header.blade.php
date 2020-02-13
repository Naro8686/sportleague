<!-- search Popup -->
<div class="body-overlay" id="body-overlay"></div>
<div class="search-popup" id="search-popup">
    <form action="#" class="search-form">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search.....">
        </div>
        <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
    </form>
</div>
<!-- //. search Popup -->

<!-- nav area start -->
<nav class="navbar navbar-area black-bg navbar-expand-lg nav-style-02">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#billatrail_main_menu"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="bar1"></span>
                <span class="bar2"></span>
                <span class="bar3"></span>
            </button>
        </div>
        <div class="logo">
            <a href="{{ route('home') }}"> <img src="{{ asset('front-assets/img/logo.png') }}" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse" id="billatrail_main_menu">
            @include('partials.front.navbar')
        </div>
        <div class="nav-right-content">
            <ul class="nav-right-menu">
                <li class="search" id="search">
                    <i class="fa fa-search"></i>
                </li>
                {{--<li>
                    <div class="humberger-wrapper d-none d-lg-block">
                        <div role="navigation" class="humberger-menu">
                            <div id="menuToggle">
                                <input type="checkbox" />
                                <span></span>
                                <span class="second"></span>
                                <span></span>

                                <ul id="menu">
                                    @if(Auth::check())
                                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                                    @else
                                        <li><a href="{{ route('login') }}">Sign In</a></li>
                                        <li><a href="{{ route('register') }}">Sign Up</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>--}}
            </ul>
        </div>
    </div>
</nav>
<!-- nav area end -->