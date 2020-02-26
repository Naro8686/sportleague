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

<div class="signinup-area">
    <div class="content col-lg-6 col-md-6">
        <div class="login-panel">
            <div class="panel-heading">
                <a href="{{ route('home') }}"><img src="{{ asset('front-assets/img/logo-black.png') }}" alt="logo"></a>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}
                    <p class="text-muted"></p>
                    <div>
                        <input name="token" value="{{ $token }}" type="hidden">
                        <div class="form-group has-feedback">
                            <input type="email" name="email" class="form-control" required placeholder="Email">
                            @if($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                            @endif
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" required placeholder="Password">
                            @if($errors->has('password'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </em>
                            @endif
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="password_confirmation" class="form-control" required placeholder="Password confirmation">
                            @if($errors->has('password_confirmation'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('password_confirmation') }}
                                </em>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn sm-btn w-100 mb-4">
                                Reset Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('partials.front.js')

</body>
</html>