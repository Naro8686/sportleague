<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ _e('Site title') }}</title>
    @include('partials.front.head')
</head>
<body>

<!-- preloader area start -->
{{--<div class="preloader" id="preloader">--}}
{{--    <div class="preloader-inner">--}}
{{--        <div class="spinner">--}}
{{--            <div class="dot1"></div>--}}
{{--            <div class="dot2"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- preloader area end -->
{{--@if(Request::is('/'))--}}
{{--    @include('partials.front.home-header')--}}
{{--@else--}}
    @include('partials.front.header')
{{--@endif--}}

@yield('content')

@include('partials.front.footer')