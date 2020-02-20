<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sport League - Coming soon</title>
    @include('partials.front.head')
</head>
<body>

<div class="coming-soon-area">
    <div class="content">
        <a href="{{ route('home') }}">
            <img src="{{ asset('front-assets/img/logo-black.png') }}" alt="logo"></a>
        <h1>WE'RE COMING SOON</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet semper augue. Maecenas gravida tortor sit amet enim venenatis tristique.</p>
        <div class="countdown"></div>
    </div>
</div>

@include('partials.front.js')
<script src="{{ asset('front-assets/js/countdown.js') }}"></script>
</body>
</html>