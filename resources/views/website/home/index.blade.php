@extends('layouts.front')

@section('content')
    <!-- home-about start -->
    <div class="home-about" id="about-area">

        <div class="container">
            <div class="row">
                <div class="about-title about-title-1">{{ $home->title }}</div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="about-image about-image-1">
                            <img src="{{ asset('front-assets/img/home1/about.png') }}" alt="About">
                            <div class="overlay-content">
                                <p>{!! $home->text !!}</p>
                            </div>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- home-about end -->
@endsection