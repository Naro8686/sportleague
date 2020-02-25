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

    <div class="card">
        <div class="card-header">{{ _e('Edit setting') }}</div>

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