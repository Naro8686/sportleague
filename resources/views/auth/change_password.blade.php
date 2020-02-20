@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="card">
    <div class="card-header">
        Change password
    </div>

    <div class="card-body">
        <form action="{{ route('auth.change_password') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group {{ $errors->has('current_password') ? 'has-error' : '' }}">
                <label for="current_password">Current password *</label>
                <input type="password" id="current_password" name="current_password" class="form-control" required>
                @if($errors->has('current_password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('current_password') }}
                    </em>
                @endif
            </div>

{{--            <div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }}">--}}
{{--                <label for="new_password">New password *</label>--}}
{{--                <input type="password" id="new_password" name="new_password" class="form-control" required>--}}
{{--                @if($errors->has('new_password'))--}}
{{--                    <em class="invalid-feedback">--}}
{{--                        {{ $errors->first('new_password') }}--}}
{{--                    </em>--}}
{{--                @endif--}}
{{--            </div>--}}

            <div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
                <label for="new_password">New password *</label>
                <div>
                    <input type="password" id="new_password" name="new_password" placeholder="Password"
                           class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                           data-placement="bottom" data-toggle="popover" data-container="body"
                           data-html="true" required>
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
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="form-group {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
                <label for="new_password_confirmation">New password confirmation *</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
                @if($errors->has('new_password_confirmation'))
                    <em class="invalid-feedback">
                        {{ $errors->first('new_password_confirmation') }}
                    </em>
                @endif
            </div>

            <div>
                <input class="btn btn-danger change_password" disabled type="submit" value="Save">
            </div>
        </form>


    </div>
</div>
@endsection

@section('javascript')
    @parent
    <style>
        .fa-file-text {
            color: #edda39;
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
            $('#new_password').keyup(function () {
                let password = $('#new_password').val();
                if (checkStrength(password) == 'Strong') {
                    $('.change_password').attr('disabled', false);
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
                    $('.reg_submit').attr('disabled', false);
                    return 'Strong'
                }
            }
        });
    </script>
@endsection