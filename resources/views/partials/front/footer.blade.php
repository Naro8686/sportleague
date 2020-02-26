<!-- brand-area start -->
<div class="brand-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="brand-slider">
                    <div class="brant-item">
                        <img src="{{ asset('front-assets/img/about-page/rossbury.png') }}" alt="brand">
                    </div>
                    <div class="brant-item">
                        <img src="{{ asset('front-assets/img/about-page/serc.png') }}" alt="brand">
                    </div>
                    <div class="brant-item">
                        <img src="{{ asset('front-assets/img/about-page/scc.png') }}" alt="brand">
                    </div>
                    <div class="brant-item">
                        <img src="{{ asset('front-assets/img/about-page/sprint.png') }}" alt="brand">
                    </div>
                    <div class="brant-item">
                        <img src="{{ asset('front-assets/img/about-page/wheelers.png') }}" alt="brand">
                    </div>
                    <div class="brant-item">
                        <img src="{{ asset('front-assets/img/about-page/barrow.png') }}" alt="brand">
                    </div>
                    <div class="brant-item">
                        <img src="{{ asset('front-assets/img/about-page/goreycc.png') }}" alt="brand">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- brand-area end -->

<div class="bottom-bg"></div>

<!-- footer area start -->
<footer class="footer-area footer-style-2">
    <div class="footer-top padding-top-40 padding-bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="footer-widget widget">
                        <div class="about_us_widget">
                            <a href="{{ route('home') }}" class="footer-logo">
                                <img src="{{ 'front-assets/img/Black_Logo.png'}}" alt="footer logo">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <div class="footer-widget widget widget_nav_menu">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            @if(!Auth::check())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                            <li><a href="{{ route('privacy.page') }}">Privacy policy</a></li>
                            <li><a href="{{ route('terms') }}">Terms and conditions</a></li>
                        </ul>
                    </div>
                </div>
{{--                <div class="col-lg-3 col-md-4">--}}
{{--                    <div class="footer-widget widget widget_nav_menu">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#" target="_blank"><i class="fa fa-facebook-f"></i></a></li>--}}
{{--                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>--}}
{{--                            <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>--}}
{{--                            <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-area-inner">
{{--                        © 2020 All rights reserved. Powered with <i class="fa fa-heart"></i> by <a href="#" target="_blank">......</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->

@include('partials.front.js')
@yield('javascript')
</body>
</html>