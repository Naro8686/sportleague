<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
<h1>Register price - {{ $league->price }}</h1>
<p>Start date: {{ $league->start_date }}</p>
<p>End date: {{ $league->end_date }}</p>
<p>Min participants {{ $league->min_users }}</p>
</body>
</html>