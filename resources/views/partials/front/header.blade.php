<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sport League</title>
    @include('partials.front.head')
</head>
<body>

<!-- preloader area start -->
<div class="preloader" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->

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
            <a href="index.html"> <img src="{{ asset('front-assets/img/logo.png') }}" alt="logo"></a>
        </div>
        <div class="collapse navbar-collapse" id="billatrail_main_menu">
            <ul class="navbar-nav">
                <li class="menu-item-has-children">
                    <a href="#">Home</a>
                    <ul class="sub-menu">
                        <li><a href="index.html">Home 01</a></li>
                        <li><a href="index-2.html">Home 02</a></li>
                        <li><a href="index-3.html">Home 03</a></li>
                    </ul>
                </li>
                <li class="current-menu-item"><a href="about.html">About</a></li>
                <li class="menu-item-has-children">
                    <a href="#">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="trails.html">Trails</a></li>
                        <li><a href="event.html">Event</a></li>
                        <li><a href="signin.html">Sign In</a></li>
                        <li><a href="signup.html">Sign Up</a></li>
                        <li><a href="404.html">404</a></li>
                        <li><a href="coming-soon.html">Coming Soon</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Ui Elements</a>
                    <ul class="sub-menu">
                        <li><a href="form.html">Form</a>
                        <li><a href="button.html">Button</a>
                        <li><a href="header-style.html">Header Style</a>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="icon.html">Icon</a></li>
                        <li><a href="accordion.html">Accordion</a></li>
                        <li><a href="tables.html">Table</a></li>
                        <li><a href="alert-cookie.html">Alert & Cookie</a></li>
                        <li><a href="countdown-menu.html">Countdown & Menu</a></li>
                        <li><a href="card.html">Card</a></li>
                        <li><a href="modals.html">Modals</a></li>
                        <li><a href="popover-list.html">Popover & List</a></li>
                        <li><a href="footer.html">Footer Style</a></li>
                        <li><a href="pagination-progressbar.html">Pagination & Progressbar</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Shop</a>
                    <ul class="sub-menu">
                        <li><a href="shop.html">Shop</a></li>
                        <li><a href="product-details.html">Product Details</a></li>
                        <li><a href="shopping-cart.html">Shopping Cart</a></li>
                        <li><a href="payment.html">Payment</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div class="nav-right-content">
            <ul class="nav-right-menu">
                <li class="search" id="search">
                    <i class="fa fa-search"></i>
                </li>
                <li>
                    <div class="humberger-wrapper d-none d-lg-block">
                        <div role="navigation" class="humberger-menu">
                            <div id="menuToggle">
                                <input type="checkbox" />
                                <span></span>
                                <span class="second"></span>
                                <span></span>

                                <ul id="menu">
                                    <li><a href="signin.html">Sign In</a></li>
                                    <li><a href="signup.html">Sign Up</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- nav area end -->