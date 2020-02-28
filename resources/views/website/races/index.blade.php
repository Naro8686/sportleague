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
                                        <div class="col-lg-3">
                                            <div class="row h-100">
                                                <div class="img-left">
                                                    <img src="{{ asset('front-assets/img/event/event.png') }}" alt="">
                                                    <div class="time">
                                                        <h3>{{ date('M d', $race->date) }}</h3>
                                                        <span>{{ $race->start_time }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 offset-lg-1 d-flex align-items-center">
                                            <div class="content">
                                                <h3>Race: {{ $race->name }}</h3>
                                                <h4>Location: <a href="{{ $race->location_link }}" target="_blank"> {{ $race->location }} <img src="{{ asset('admin-assets/assets/images/location.png') }}" width="25" alt=""></a></h4>
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