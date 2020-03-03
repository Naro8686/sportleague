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
                @if($errors->any())
                    <div class="alert-danger">
                        @if($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                    </div>
                @endif
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
                            <input type="password" id="password" name="password" class="form-control" required placeholder="Password">
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

                        <div id="popover-password">
                            <p>Password Strength: <span id="result"> </span></p>
                            <div class="progress" style="height: 5px;">
                                <div id="password-strength" class="progress-bar progress-bar-success"
                                     role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                     style="width:0%">
                                </div>
                            </div>
                            <ul class="list-unstyled">
                                <li class="">
                                        <span class="low-upper-case">
                                            <i class="fa fa-file-text" aria-hidden="true"></i>
                                        </span>&nbsp; 1 lowercase &amp; 1 uppercase
                                </li>
                                <li class="">
                                        <span class="one-number">
                                            <i class="fa fa-file-text" aria-hidden="true"></i>
                                        </span>&nbsp; 1 number (0-9)
                                </li>
                                <li class="">
                                        <span class="one-special-char">
                                            <i class="fa fa-file-text" aria-hidden="true"></i>
                                        </span>&nbsp; 1 Special Character (!@#$%^&*).
                                </li>
                                <li class="">
                                        <span class="eight-character">
                                            <i class="fa fa-file-text" aria-hidden="true"></i>
                                        </span>&nbsp; Atleast 8 Character
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn sm-btn w-100 mb-4 reset_pass" disabled>
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
<style>
    .fa-file-text {
        color: #000;
    }

    #popover-password, #popover-password p {
        text-align: left;
        color: #000;
    }

    #popover-password .progress {
        background-color: var(--main-color);
    }

    #popover-password .progress-bar {
        background-color: green;
    }

    #popover-password, .list-unstyled {
        margin: 10px 0 0 0;
    }
</style>
<script>
    $(document).ready(function () {
        $('#password').keyup(function () {
            let password = $(this).val();
            if (checkStrength(password) !== 'Strong') {
                $('.reset_pass').attr('disabled', true);
            }
        });

        function checkStrength(password) {
            let strength = 0;
            if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
                strength += 1;
                $('.low-upper-case').addClass('text-success');
                $('.low-upper-case i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');
            } else {
                $('.low-upper-case').removeClass('text-success');
                $('.low-upper-case i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }
            if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
                strength += 1;
                $('.one-number').addClass('text-success');
                $('.one-number i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');
            } else {
                $('.one-number').removeClass('text-success');
                $('.one-number i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }
            if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                strength += 1;
                $('.one-special-char').addClass('text-success');
                $('.one-special-char i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');
            } else {
                $('.one-special-char').removeClass('text-success');
                $('.one-special-char i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }
            if (password.length > 7) {
                strength += 1;
                $('.eight-character').addClass('text-success');
                $('.eight-character i').removeClass('fa-file-text').addClass('fa-check');
                $('#popover-password-top').addClass('hide');
            } else {
                $('.eight-character').removeClass('text-success');
                $('.eight-character i').addClass('fa-file-text').removeClass('fa-check');
                $('#popover-password-top').removeClass('hide');
            }

            if (strength < 2) {
                $('#result').removeClass()
                $('#password-strength').addClass('progress-bar-danger');

                $('#result').addClass('text-danger').text('Very Week');
                $('#password-strength').css('width', '10%');
            } else if (strength == 2) {
                $('#result').addClass('good');
                $('#password-strength').removeClass('progress-bar-danger');
                $('#password-strength').addClass('progress-bar-warning');
                $('#result').addClass('text-warning').text('Week')
                $('#password-strength').css('width', '60%');
                return 'Week'
            } else if (strength == 4) {
                $('#result').removeClass()
                $('#result').addClass('strong');
                $('#password-strength').removeClass('progress-bar-warning');
                $('#password-strength').addClass('progress-bar-success');
                $('#result').addClass('text-success').text('Strength');
                $('#password-strength').css('width', '100%');
                $('.reset_pass').attr('disabled', false);
                return 'Strong'
            }
        }
    });
</script>

</body>
</html>