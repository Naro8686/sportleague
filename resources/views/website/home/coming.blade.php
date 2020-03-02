<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ _e('Site title') }} - Coming soon</title>
    @include('partials.front.head')
</head>
<body>

<div class="coming-soon-area">
    <div class="content">
        <a href="{{ route('home') }}">
            <img src="{{ asset('logo/'. _c('black_logo')) }}" alt="logo"></a>
        <h1>{{ $coming['title'] }}</h1>
        <p>{{ $coming['description'] }}</p>
        <div class="countdown"></div>
    </div>
</div>

@include('partials.front.js')
<script>
    /*--------------------
            Countdown
        ---------------------*/
    const countdown = document.querySelector(".countdown");

    const launchDate = new Date("{{ $coming['date'] }}").getTime();

    const intvl = setInterval(function() {
        const now = new Date().getTime();

        const distance = launchDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const mins = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const sec = Math.floor((distance % (1000 * 60)) / 1000);

        //Display Result
        countdown.innerHTML = `
        <div class="countdown__item"><h2 class="countdown__lg-text">${days}</h2><span class="countdown__sm-text">Days</span></div>
        <div class="countdown__item"><h2 class="countdown__lg-text">${hours}</h2><span class="countdown__sm-text">Hour</span></div>
        <div class="countdown__item"><h2 class="countdown__lg-text">${mins}</h2><span class="countdown__sm-text">Minutes</span></div>
        <div class="countdown__item"><h2 class="countdown__lg-text">${sec}</h2><span class="countdown__sm-text">Seconds</span></div>
    `;

        if (distance < 0) {
            clearInterval(intvl);
            countdown.style.color = "#17a2b8";
            countdown.innerHTML = "";
        }
    }, 1000);
</script>
</body>
</html>