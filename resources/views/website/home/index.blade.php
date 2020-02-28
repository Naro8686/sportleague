@extends('layouts.front')

@section('content')
    <div class="explore-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex align-items-center my-5">
                    <div class="explore_right">
                        <h1>{{ $home->title }}</h1>
                        <p>{!! $home->text !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection