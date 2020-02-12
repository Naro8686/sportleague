@extends('layouts.front')

@section('content')

    <div class="event-tab">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="tab-content">
                        <div class="tab-one-content">
                            <div class="event-left-content">
                                @foreach($races as $race)
                                    <div class="img-item row">
                                        <div class="col-lg-4">
                                            <div class="row h-100">
                                                <div class="img-left">
                                                    <img src="{{ asset('front-assets/img/event/event.png') }}" alt="">
                                                    <div class="time">
                                                        <h3>{{ date('M d', strtotime($race->date)) }}</h3>
                                                        <span>{{ $race->start_time }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 offset-lg-1 d-flex align-items-center">
                                            <div class="content">
                                                <span class="text">{{ $race->name }}</span>
                                                <h4>Club: {{ $race->club->name }}</h4>
                                                <p>{{ $race->location }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection