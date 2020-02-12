@extends('layouts.front')

@section('content')
    <!-- home-about start -->
    <div class="home-about" id="about-area">

        <div class="container">
            <div class="row">
                <div class="about-title about-title-1">About league</div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="about-image about-image-1">
                            <img src="{{ asset('front-assets/img/home1/about.png') }}" alt="About">
                            <div class="overlay-content">
                                <p>Register price - {{ $league->price }}</p>
                                <p>Start date: {{ $league->start_date }}</p>
                                <p>End date: {{ $league->end_date }}</p>
                                <p>Min participants {{ $league->min_marshals }}</p>
                            </div>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="home-about-slider">
                        @foreach($races as $race)
                        <div class="single-item">
                            <img src="{{ asset('front-assets/img/home1/about-slider1.png') }}" alt="">
                            <h3>{{ $race->name }}</h3>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="ceramic animated slideRotateFromRight">Ceramic Speed</div> -->
    </div>
    <!-- home-about end -->
@endsection