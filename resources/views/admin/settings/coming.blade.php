@extends('layouts.admin')
@section('content')
    <style>
        .switch {
            display: flex;
            align-items: center;
            position: relative;
        }
        .switch input {
            position: absolute;
            top: 0;
            z-index: 2;
            opacity: 0;
            cursor: pointer;
        }
        .switch input:checked {
            z-index: 1;
        }
        .switch input:checked + label {
            opacity: 1;
            cursor: default;
        }
        .switch input:not(:checked) + label:hover {
            opacity: 0.5;
        }
        .switch label {
            color: #000;
            opacity: 0.33;
            transition: opacity 0.25s ease;
            cursor: pointer;
        }
        .switch .toggle-outside {
            height: 100%;
            border-radius: 2rem;
            padding: 0.25rem;
            overflow: hidden;
            transition: 0.25s ease all;
        }
        .switch .toggle-inside {
            border-radius: 5rem;
            background: #fff;
            position: absolute;
            transition: 0.25s ease all;
        }
        .switch--horizontal input {
            height: 40px;
            width: 6rem;
            left: 6rem;
            margin: 0;
        }
        .switch--horizontal label {
            display: inline-block;
            width: 6rem;
            height: 100%;
            margin: 0;
            font-size: .875rem;
            line-height: 1.5;
            text-align: center;
        }
        .switch--horizontal label:last-of-type {
            margin-left: 3rem;
        }
        .switch--horizontal .toggle-outside {
            background: #727cf5;
            position: absolute;
            width: 60px;
            height: 28px;
            left: 6rem;
        }
        .switch--horizontal .toggle-inside {
            height: 20px;
            width: 20px;
        }
        .switch--horizontal input:checked ~ .toggle-outside .toggle-inside {
            left: 0.25rem;
        }
        .switch--horizontal input ~ input:checked ~ .toggle-outside .toggle-inside {
            left: 35px;
        }
    </style>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-version" role="tab" aria-controls="nav-home" aria-selected="true">Version</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-logo" role="tab" aria-controls="nav-profile" aria-selected="false">Logos</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-mail" role="tab" aria-controls="nav-profile" aria-selected="false">Mail</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-payment" role="tab" aria-controls="nav-contact" aria-selected="false">Payment</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-reset" role="tab" aria-controls="nav-contact" aria-selected="false">Reset</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-version" role="tabpanel" aria-labelledby="nav-version-tab">
            <div class="card">
                <div class="card-header">{{ _e('Version settings') }}</div>

                <div class="card-body">
                    <form action="{{ route("admin.coming-update") }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="content" class="d-block mb-3">{{ _e('Site version') }}</label>
                            <div class="switch switch--horizontal">
                                <input id="radio-a" class="change_version" type="radio" name="show" value="true" {{ ($setting['show'] == 'true') ? 'checked' : '' }}/>
                                <label for="radio-a">{{ _e('Coming soon') }}</label>
                                <input id="radio-b" class="change_version" type="radio" name="show" value="false" {{ ($setting['show'] == 'false') ? 'checked' : '' }}>/>
                                <label for="radio-b">{{ _e('Live Version') }}</label>
                                <span class="toggle-outside">
                            <span class="toggle-inside"></span>
                        </span>
                            </div>
                        </div>

                        <div class="is_coming">
                            <div class="form-group">
                                <label class="d-block">{{ _e('Countdown') }}</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="countdown" id="optionsRadios5" value="true" {{ ($setting['countdown'] == 'true') ? 'checked' : '' }}>
                                        {{ _e('Show') }}
                                        <i class="input-frame"></i></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="countdown" id="optionsRadios6" value="false" {{ ($setting['countdown'] == 'false') ? 'checked' : '' }}>
                                        {{ _e('Hide') }}
                                        <i class="input-frame"></i></label>
                                </div>
                            </div>

                            <div class="form-group is_countdown">
                                <label for="coming_date">{{ _e('Date') }}</label>
                                <input type="text" id="coming_date" name="date" class="form-control" value="{{ $setting['date'] }}" required>
                            </div>

                            <div class="form-group">
                                <label for="title">{{ _e('Text') }}</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ $setting['title'] }}" required>
                            </div>

                            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                                <label for="description">{{ _e('Content') }}</label>
                                <input type="text" id="description" name="description" class="form-control" value="{{ $setting['description'] }}" required>
                            </div>
                        </div>

                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ _e('Save') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-logo" role="tabpanel" aria-labelledby="nav-logo-tab">
            <div class="card">
                <div class="card-header">Logo Settings</div>

                <div class="card-body">
                    <form action="{{ route("admin.logo-update") }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label for="logo">
                            <img src="{{ asset('logo/'. _c('logo')) }}">
                        </label>
                        <div class="form-group is_countdown">
                            <label for="logo">White logo</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>

                        <label for="logo">
                            <img src="{{ asset('logo/'. _c('black_logo')) }}">
                        </label>
                        <div class="form-group is_countdown">
                            <label for="black_logo">Black logo</label>
                            <input type="file" name="black_logo" id="black_logo" class="form-control">
                        </div>

                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ _e('Save') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-mail" role="tabpanel" aria-labelledby="nav-mail-tab">
            <div class="card">
                <div class="card-header">Mail settings</div>

                <div class="card-body">
                    <form action="{{ route("admin.mail-update") }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group is_countdown">
                            <label for="contact_mail">Contact Mail</label>
                            <input type="text" id="contact_mail" name="contact_mail" class="form-control" value="{{ _c('contact_mail') }}" required>
                        </div>

                        <div class="form-group is_countdown">
                            <label for="driver">Driver</label>
                            <input type="text" id="driver" name="driver" class="form-control" value="{{ $smtp['driver'] }}" required>
                        </div>

                        <div class="form-group is_countdown">
                            <label for="host">Host</label>
                            <input type="text" id="host" name="host" class="form-control" value="{{ $smtp['host'] }}" required>
                        </div>

                        <div class="form-group is_countdown">
                            <label for="port">Port</label>
                            <input type="text" id="port" name="port" class="form-control" value="{{ $smtp['port'] }}" required>
                        </div>

                        <div class="form-group is_countdown">
                            <label for="from">From</label>
                            <input type="text" id="from" name="from" class="form-control" value="{{ $smtp['from'] }}" required>
                        </div>

                        <div class="form-group is_countdown">
                            <label for="from_name">From name</label>
                            <input type="text" id="from_name" name="from_name" class="form-control" value="{{ $smtp['from_name'] }}" required>
                        </div>

                        <div class="form-group is_countdown">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" value="{{ $smtp['username'] }}" required>
                        </div>

                        <div class="form-group is_countdown">
                            <label for="password">Password</label>
                            <input type="text" id="password" name="password" class="form-control" value="{{ $smtp['password'] }}" required>
                        </div>

                        <div class="form-group is_countdown">
                            <label for="encryption">Encryption</label>
                            <input type="text" id="encryption" name="encryption" class="form-control" value="{{ $smtp['encryption'] }}" required>
                        </div>

                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ _e('Save') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab">
            <div class="card">
                <div class="card-header">Paypal Settings</div>

                <div class="card-body">
                    <form action="{{ route("admin.paypal-update") }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group is_countdown">
                            <label for="client_id">Paypal Client ID</label>
                            <input type="text" id="client_id" name="client_id" class="form-control" value="{{ _c('Paypal Client ID') }}" required>
                        </div>

                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ _e('Save') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-reset" role="tabpanel" aria-labelledby="nav-reset-tab">
            <div class="card">
                <div class="card-header">Reset Password Settings</div>

                <div class="card-body">
                    <form action="{{ route("admin.reset-update") }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group is_countdown">
                            <label for="hello">Reset Hello</label>
                            <input type="text" id="hello" name="hello" class="form-control" value="{{ $reset['hello'] }}" required>
                        </div>

                        <div class="form-group is_countdown">
                            <label for="second">Second text</label>
                            <input type="text" id="second" name="second" class="form-control" value="{{ $reset['second'] }}" required>
                        </div>

                        <div class="form-group is_countdown">
                            <label for="button">Button text</label>
                            <input type="text" id="button" name="button" class="form-control" value="{{ $reset['button'] }}" required>
                        </div>

                        <div class="form-group is_countdown">
                            <label for="bottom">Bottom</label>
                            <input type="text" id="bottom" name="bottom" class="form-control" value="{{ $reset['bottom'] }}" required>
                        </div>

                        <div class="form-group is_countdown">
                            <label for="regards">Regards</label>
                            <input type="text" id="regards" name="regards" class="form-control" value="{{ $reset['regards'] }}" required>
                        </div>

                        <div class="form-group is_countdown">
                            <label for="manager">{{ _e('Site title') }}</label>
                            <input type="text" id="manager" name="manager" class="form-control" value="{{ $reset['manager'] }}" required>
                        </div>

                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ _e('Save') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            if($('input[type=radio][name=show]:checked').val() == 'false'){
                $('.is_coming').hide();
            }

            $(document).on('change', 'input[type=radio][name=show]', function () {
                if ($(this).val() == 'true') {
                    $('.is_coming').show();
                }else{
                    $('.is_coming').hide();
                }
            });

            if($('input[type=radio][name=countdown]:checked').val() == 'false'){
                $('.is_countdown').hide();
                $('#coming_date').val('0');
            }

            $(document).on('change', 'input[type=radio][name=countdown]', function () {
                if ($(this).val() == 'true') {
                    $('.is_countdown').show();
                    $('#coming_date').val('Feb 28, 2020 13:00:00');
                }else{
                    $('.is_countdown').hide();
                    $('#coming_date').val('0');
                }
            });
        });
    </script>
@endsection