<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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

<div class="signinup-area">
    <div class="content col-lg-6 col-md-6">
        <div class="login-panel">
            <div class="panel-heading">
                <a href="{{ route('home') }}"><img src="{{ asset('front-assets/img/logo-black.png') }}" alt="logo"></a>
            </div>
            <div class="panel-body">
                <form class="forms-sample" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="Email" value="{{ old('email', null) }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="Password">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-check form-check-flat form-check-primary">

                    </div>

                    <div class="action">
                        <div class="action-left">
                            <p>
                                <label class="form-check-label">
                                    <input name="remember" type="checkbox" id="remember" />
                                    Remember me
                                </label>
                            </p>
                            <p><a href="{{ url('password/reset') }}" class="gmail">Forgot password?</a></p>
                        </div>
                        <div class="btn-wrapper desktop-right">
                            <button type="submit" class="btn sm-btn">Sign in</button>
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