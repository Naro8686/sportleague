<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset password</title>
    @include('partials.front.head')
    <style>
        .has-feedback .invalid-feedback {
            display: block;
        }
    </style>
</head>
<body>

<div class="signinup-area">
    <div class="content col-lg-6 col-md-6">
        <div class="login-panel">
            <div class="panel-heading">
                <a href="{{ route('home') }}"><img src="{{ asset('front-assets/img/logo-black.png') }}" alt="logo"></a>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control" required="autofocus" placeholder="Email">
                        @if($errors->has('email'))
                            <em class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </em>
                        @endif
                    </div>
                    <div class="action">
                        <div class="btn-wrapper desktop-right">
                            <button type="submit" class="btn sm-btn">
                                Reset Password
                            </button>
                        </div>
                    </div>
                    <p class="bottom">Don't Have An Account Please <a class="signup" href="{{ route('register') }}">Sign up </a> Now</p>
                </form>
            </div>
        </div>
    </div>
</div>

@include('partials.front.js')

</body>
</html>