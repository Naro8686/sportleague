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
        <h1>{{ $coming_text }}</h1>
        <p>{{ $coming_description }}</p>
        <div class="countdown"></div>
    </div>
</div>

@include('partials.front.js')
<script>
    /*--------------------
            Countdown
        ---------------------*/
    //Countdown Timer
    const countdown = document.querySelector(".countdown");

    //Set Launch Date
    const launchDate = new Date("{{ $coming_date }}").getTime();

    //Update every second
    const intvl = setInterval(function() {
        //Get todays date and time (ms)
        const now = new Date().getTime();

        //Distance from now to the launch date
        const distance = launchDate - now;

        //Time calculation
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

        //If launch date passed
        if (distance < 0) {
            //Stop countdown
            clearInterval(intvl);
            //Style and ouput text
            countdown.style.color = "#17a2b8";
            countdown.innerHTML = "Launched!";
        }
    }, 1000);
</script>
</body>
</html>