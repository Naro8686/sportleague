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

<div class="info-popup">
    <div class="info-popup-content">
        <button type="button" class="info-popup-content_close">X</button>
        <div class="row no-gutters">
            <div class="col-xl-7 col-12 col-sm-6">
                <div class="info-popup-content__img info-popup-content__img--one"></div>
            </div>
            <div class="col-xl-5 col-12 col-sm-6">
                <div class="info-popup-content__text">
                    <div class="info-popup-content__text-header">
                        <h3 class="info-popup-content__title">Opening Hours</h3>
                    </div>
                    <div class="info-popup-content__text-body">
                        <span class="info-popup-content__text-is">monday - sunday</span>
                        <span class="info-popup-content__text-is">8.00 am - 9.00 pm</span>
                    </div>
                    <div class="info-popup-content__text-footer">
                        <span class="info-popup-content__text-is">+880 046 292 02</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--info-popup-->

<div class="location-popup">
    <div class="location-popup-content">
        <button type="button" class="message-popup-content_close">X</button>
        <div class="row no-gutters">
            <div class="col-lg-7 col-12 col-sm-6">
                <div class="mapouter2">
                    <div class="gmap_canvas2">
                        <iframe width="100%" height="100%" id="gmap_canvas2" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <a href="https://www.embedgooglemap.net/blog/elementor-pro-discount-code-review/">elementor review</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-12 col-sm-6">
                <div class="location-popup-content__text">
                    <div class="location-popup-content__text-header">
                        <h3 class="location-popup-content__title">Address</h3>
                    </div>
                    <div class="location-popup-content__text-body">
                            <span class="location-popup-content__text-is">
                                2, Ave Manchester, Lorem <br />
                                ipsum St, Rio Danubin
                            </span>
                    </div>
                    <div class="btn-wrapper">
                        <a href="#" class="btn btn-element btn-normal btn-gray">Open in maps</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--location-popup-->

<div class="message-popup">
    <div class="message-popup-content">
        <button type="button" class="message-popup-content_close">X</button>
        <div class="row no-gutters">
            <div class="col-lg-7 col-12 col-sm-6">
                <div class="message-popup-content__text text-left pl-5">
                    <div class="message-popup-content__text-header">
                        <h3 class="message-popup-content__title mb-3">
                            You have a question for us?
                        </h3>
                    </div>
                    <div class="message-popup-content__text-body">
                        <form action="#">
                            <div class="row">
                                <div class="col-12 margin-top-20">
                                    <input type="text" placeholder="Email address" class="contact-form__input"/>
                                </div>
                                <div class="col-12 margin-top-20">
                                    <textarea name="Message" placeholder="Message" class="contact-form__textarea" cols="30" rows="2" ></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="btn-wrapper desktop-center margin-top-30">
                                        <a href="#" class="btn btn-element btn-lg btn-red">Send</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-12 col-sm-6">
                <div class="message-popup-content__img message-popup-content__img--three"></div>
            </div>
        </div>
    </div>
</div><!--message-popup-->

<!-- navbar start -->
<div class="billa-navbar">
    <nav class="navbar navbar-area navbar-expand-lg nav-style-01">
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
                <a href="index.html"> <img src="{{ asset( 'front-assets/img/logo.png') }}" alt="logo"></a>
            </div>
            <div class="collapse navbar-collapse" id="billatrail_main_menu">
                @include('partials.front.navbar')
            </div>
        </div>
    </nav>
</div>
<!-- navbar end -->

<!-- banner start -->
<div class="banner-area home-banner1">
    <div class="banner-slider banner-slider1">
        <div class="banner-bg" style="background-image:url({{ asset( 'front-assets/img/bg/1.png') }});">
            <div class="container">
                <div class="row h-100vh">
                    <div class="col-xl-10 col-lg-10 offset-lg-2 offset-xl-1 col-md-8 offset-md-2">
                        <div class="banner-inner">
                            <p data-animation-in="fadeInLeft">Growing up in Michigan, I was lucky enough to<br> experience one part of the Great Lakes.</p>
                            <h1 class="title1" data-animation-in="fadeInDown">Biking</h1>
                            <h1 class="title2" data-animation-in="fadeInUp">Mountain</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-bg" style="background-image:url({{ asset( 'front-assets/img/bg/2.png') }});">
            <div class="container">
                <div class="row h-100vh">
                    <div class="col-xl-10 col-lg-10 offset-lg-2 offset-xl-1 col-md-8 offset-md-2">
                        <div class="banner-inner">
                            <p data-animation-in="fadeInLeft">Riding Is A Way To Explore<br> A Way To Explore Nature And The World.</p>
                            <h1 class="title1" data-animation-in="fadeInDown">Denver</h1>
                            <h1 class="title2" data-animation-in="fadeInUp">Have Fun</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-bg" style="background-image:url({{ asset( 'front-assets/img/bg/3.png') }});">
            <div class="container">
                <div class="row h-100vh">
                    <div class="col-xl-10 col-lg-10 offset-lg-2 offset-xl-1 col-md-8 offset-md-2">
                        <div class="banner-inner">
                            <p data-animation-in="fadeInLeft">Growing up in Michigan, I was lucky enough to<br> experience one part of the Great Lakes.</p>
                            <h1 class="title1" data-animation-in="fadeInDown">Biking</h1>
                            <h1 class="title2" data-animation-in="fadeInUp">Feel good</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-bg" style="background-image:url({{ asset( 'front-assets/img/bg/4.png') }});">
            <div class="container">
                <div class="row h-100vh">
                    <div class="col-xl-10 col-lg-10 offset-lg-2 offset-xl-1 col-md-8 offset-md-2">
                        <div class="banner-inner">
                            <p data-animation-in="fadeInLeft">Life is like riding<br> you must keep moving</p>
                            <h1 class="title1" data-animation-in="fadeInDown">Honk</h1>
                            <h1 class="title2" data-animation-in="fadeInUp">Mountain</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-bg" style="background-image:url({{ asset( 'front-assets/img/bg/05.jpg') }});">
            <div class="container">
                <div class="row h-100vh">
                    <div class="col-xl-10 col-lg-10 offset-lg-2 offset-xl-1 col-md-8 offset-md-2">
                        <div class="banner-inner">
                            <p data-animation-in="fadeInLeft">Nothing compares<br> the simple pleasure of a bike ride</p>
                            <h1 class="title1" data-animation-in="fadeInDown">Denver</h1>
                            <h1 class="title2" data-animation-in="fadeInUp">Feel good</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- social icon -->
    <ul class="social-icon">
        <li class="icon-list">
            <a href="#" class="icon-text">
                <i class="fa fa-twitter"></i>
            </a>
        </li>
        <li class="icon-list">
            <a href="https://www.facebook.com/codingeek.net/" target="_blank" class="icon-text">
                <i class="fa fa-facebook-f"></i>
            </a>
        </li>
        <li class="icon-list">
            <a href="#" class="icon-text">
                <i class="fa fa-instagram"></i>
            </a>
        </li>
        <li class="icon-list">
            <a href="#" class="icon-text">
                <i class="fa fa-youtube"></i>
            </a>
        </li>
    </ul>

    <!-- video button -->
    <div class="video-btn">
        <a href="#"><i class="fa fa-play"></i></a>
    </div>

    <!-- scroll down -->
    <div class="scroll">
        <a href="#about-area"><div class="scroll-btn"><span class="inside-bg"></span></div></a>
        <span>Scroll to explore</span>
    </div>

    <!-- biking btn -->
    <div class="banner-btn d-none d-md-block ">
        <a href="#" class="btn animated slideRotateFromRight">Real biking feel<span></span></a>
    </div>

    <div class="banner-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-5 d-none d-lg-block">
                    <div class="controler-wrapper">
                        <div class="active-controler">01</div>
                        <div class="progressbar">
                            <span class="home-slider-progress"></span>
                            <span class="home-slider-progress-active"></span>
                        </div>
                        <div class="total-controler">05</div>
                    </div>
                </div>
                <div class="col-xl-3 offset-lg-1 col-lg-4 col-md-6 offset-md-2 col-sm-6 offset-sm-2 col-10 offset-1">
                    <div class="banner-sm-slider d-flex">
                        <div class="slider-image1"><img src="{{ asset( 'front-assets/img/bg/sm1.jpg') }}" alt=""></div>
                        <div class="slider-image2"><img src="{{ asset( 'front-assets/img/bg/sm2.jpg') }}" alt=""></div>
                        <div class="slider-image3"><img src="{{ asset( 'front-assets/img/bg/sm3.jpg') }}" alt=""></div>
                        <div class="slider-image4"><img src="{{ asset( 'front-assets/img/bg/sm4.jpg') }}" alt=""></div>
                        <div class="slider-image4"><img src="{{ asset( 'front-assets/img/bg/sm5.jpg') }}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--social-icon-->
</div>
<!-- banner end -->