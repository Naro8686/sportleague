@extends('layouts.front')

@section('content')

    <div class="explore-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                    <div class="row">
                        <div class="explore_left">
                            <img src="{{ asset('front-assets/img/about-page/explore.png') }}" alt="Explore">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-md-12 offset-xl-1 d-flex align-self-center">
                    <div class="row">
                        <div class="explore_right">
                            <h1>{{ $policy->title }}</h1>
                            <p>{!! $policy->text !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection